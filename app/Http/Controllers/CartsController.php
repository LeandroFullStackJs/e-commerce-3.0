<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Receipt;
use App\ReceiptProduct;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{

    public function show(){
        if(Auth::user() == null){
            return redirect('/login');
        }
        $Products = Auth::user()->cart;
        $totalPrice = 0;


        foreach ($Products as $Product) {
            $totalPrice += $Product->price * $Product->pivot->quantity;

        }

        return view('/cart', compact('Products', 'totalPrice'));
    }

    public function addProduct(Request $request){

        if(Auth::user() == null){
            return redirect('/login');
        }

        if(Cart::where([['user_id','=', Auth::user()->id], ['product_id', '=', $request['product_id']]])->exists()){
            return redirect('/cart');
        }

        $this->validate($request, ['quantity' => 'numeric|max:'.Product::find($request['product_id'])->stock], ['max' => 'No hay stock suficiente']);


        $Cart = new Cart;
        $Cart->user_id = Auth::user()->id;
        $Cart->product_id = $request['product_id'];
        $Cart->quantity = $request['quantity'];

        $Cart->save();

        return redirect('/cart');
    }

    public function modifyProductQuantity(Request $request){
        $this->validate($request, ['quantity' => 'numeric|max:'.Product::find($request['product_id'])->stock], ['max' => Product::find($request['product_id'])->name]);

        $Cart = Cart::where([['user_id','=', Auth::user()->id], ['product_id', '=', $request['product_id']]])->get()->pop();


        $Cart->quantity = $request['quantity'];

        $Cart->save();

        return redirect('/cart');
    }


    public function removeProduct(Request $request){

       $Cart = Cart::where([['user_id','=', Auth::user()->id], ['product_id', '=', $request['product_id']]])->get()->pop();

       $Cart->delete();

       return redirect('/cart');
   }

    public function checkout(Request $request){
        $Products = Auth::user()->cart;
        $totalPrice = 0;

        foreach ($Products as $Product) {
            if($Product->pivot->quantity > $Product->stock){  // Me fijo que todavia haya el stock deseado por el usuario ya que
                $stockErrors[] = $Product->name;              // puede cambiar mientras tiene el producto en el carrito
                $totalPrice += $Product->price * $Product->pivot->quantity;
            }
        }

        if (isset($stockErrors)){
            return redirect('/cart')->withErrors($stockErrors); //Avisa que ya no hay stock suficiente
        }

        $Receipt = new Receipt;
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $Receipt->user_id = Auth::user()->id;
        $Receipt->date = date("Y-m-d H:i:s");
        $Receipt->save();  // creo el recibo y lo guardo en la base de datos


        foreach ($Products as $Product) {
            $ReceiptProduct = new ReceiptProduct;
            $ReceiptProduct->billing_total = $totalPrice;
            $ReceiptProduct->receipt_id = $Receipt->id;
            $ReceiptProduct->product_id = $Product->id;
            $ReceiptProduct->quantity = $Product->pivot->quantity;
            $ReceiptProduct->save(); // se registran los productos de la compra
            $Product->stock -= $Product->pivot->quantity; //se actualiza el stock del producto
            $Product->save(); //se actualiza el stock del producto
        }



        $Cart = Cart::where('user_id','=', Auth::user()->id)->get();
        foreach ($Cart as $CartItem) {
            $CartItem->delete(); // Borrar los productos del carrito
        }

        return redirect('/checkout');
    }
}
