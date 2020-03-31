<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Order;
use App\OrderProduct;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
  public function index(){

    return view('checkout');
  }


     public function show(){
         if(Auth::user() == null){
             return redirect('/login');
         }
         $cart = cart::where('user_id','=', Auth::user()->id)->get();



         $Products = Auth::user()->cart;
         $totalPrice = 0;


         foreach ($Products as $Product) {
             $totalPrice += $Product->price * $Product->pivot->quantity;


         }

        if ($totalPrice != 0){                                           //si no pones nada y sos rata , te devuelvo a la view cart
         return view('/checkout', compact('Products', 'totalPrice'));
         }
         else {
           return view('/cart', compact('Products', 'totalPrice'));
         }
     }

     public function checkout(Request $request){
         $Products = Auth::user()->cart;
         $totalPrice = 0;
         foreach ($Products as $Product) {
                     if($Product->pivot->quantity > $Product->stock){  // Me fijo que todavia haya el stock deseado por el usuario ya que
                         $stockErrors[] = $Product->name;              // puede cambiar mientras tiene el producto en el carrito
                     }
                 }
                 foreach ($Products as $Product) {
                     $totalPrice += $Product->price * $Product->pivot->quantity;


                 }
                 if (isset($stockErrors)){
            return redirect('/cart')->withErrors($stockErrors); //Avisa que ya no hay stock suficiente
        }
        $charge = Stripe::charges()->create([
                'amount' => $totalPrice,
                'currency' => 'ARS',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    
                  ],
          ]);

          $order = new Order;
            $order->billing_email = $request->email;
            $order->billing_name = $request->name;
            $order->billing_address = $request->address;
            $order->billing_city = $request->city;
            $order->billing_province = $request->province;
            $order->billing_postalcode = $request->postalcode;
            $order->billing_phone = $request->phone;
            $order->billing_name_on_card = $request->name_on_card;
          $order->billing_total = $totalPrice;
          $order->user_id = Auth::user()->id;
          $order->save();  // creo el recibo y lo guardo en la base de datos


         foreach ($Products as $Product) {
             $orderProduct = new OrderProduct;
             $orderProduct->product_id = $Product->id;
              $orderProduct->order_id = $order->id;
             $orderProduct->quantity = $Product->pivot->quantity;

             $orderProduct->save(); // se registran los productos de la compra
             $Product->stock -= $Product->pivot->quantity; //se actualiza el stock del producto
             $Product->save(); //se actualiza el stock del producto
         }
         $cart = cart::where('user_id','=', Auth::user()->id)->get();
        foreach ($cart as $cartItem) {
            $cartItem->delete(); // Borrar los productos del carrito
        }
         return redirect('/my-orders');

     }

  }
