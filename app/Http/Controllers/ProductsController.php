<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use App\Product;
use App\Category;
use App\Mark;
use App\ProductsImages;
use DB;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Products = Product::all();
        return view('adminProducts', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Marks = Mark::all();
        $Categories = Category::all();
        return view('addProduct', compact('Marks', 'Categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:products',
                'price' => 'required|numeric|min:1',
                'stock' => 'required|numeric|min:0',
                'description' => 'required|min:15',
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif',
                'category_id' => 'required',
                'mark_id' => 'required'
            ],

            [
                'name.required' => 'Completar campo nombre',
                'price.required' => 'Completar campo precio',
                'stock.required' => 'Completar campo stock',
                'description.required' => 'Completar campo descripción',
                'category_id.required' => 'Seleccionar categoría',
                'mark_id.required' => 'Seleccionar marca',
                'image.required' => 'Subir foto del producto',
                'numeric' => 'En el campo :attribute debe ingresarse un valor numérico',
                'name.min' => 'En el campo :attribute deben ingresarse al menos 3 caracteres',
                'description.min' => 'En el campo :attribute deben ingresarse al menos 15 caracteres',
                'description.min' => 'En el campo :attribute deben ingresarse al menos 15 caracteres',
                'price.min' => 'En el campo :attribute deben ingresarse un valor positivo',
                'stock.min' => 'En el campo :attribute deben ingresarse un valor mayor o igual a 0',
            ]
        );



        $imageName = time() . '.' . $request['image']->getClientOriginalExtension();

        $request['image']->move(public_path('product_img/'), $imageName);


        $Product = new Product;
        $Product->name = $request['name'];
        $Product->price = $request['price'];
        $Product->stock = $request['stock'];
        $Product->image = $imageName;
        $Product->description = $request['description'];
        $Product->category_id = $request['category_id'];
        $Product->mark_id = $request['mark_id'];

        $Product->save();

        return redirect('adminProducts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $Product = Product::find($id);
      $ProductsAltImages = ProductsImages::where('product_id',$id)->get();
      return view('product-detail', compact('Product','ProductsAltImages'));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Marks = Mark::all();
        $Categories = Category::all();
        $Product = Product::find($id);
        return view('editProduct', compact('Marks', 'Categories', 'Product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Product = Product::find($id);

        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:products,name,'.$Product->id,
                'price' => 'required|numeric|min:1',
                'stock' => 'required|numeric|min:0',
                'description' => 'required|min:15',
                'image' => 'mimes:jpg,jpeg,png,svg,gif',
                'category_id' => 'required',
                'mark_id' => 'required'
            ],

            [
                'name.required' => 'Completar campo nombre',
                'price.required' => 'Completar campo precio',
                'stock.required' => 'Completar campo stock',
                'description.required' => 'Completar campo descripción',
                'category_id.required' => 'Seleccionar categoría',
                'mark_id.required' => 'Seleccionar marca',
                'numeric' => 'En el campo :attribute debe ingresarse un valor numérico',
                'name.min' => 'En el campo :attribute deben ingresarse al menos 3 caracteres',
                'description.min' => 'En el campo :attribute deben ingresarse al menos 15 caracteres',
                'description.min' => 'En el campo :attribute deben ingresarse al menos 15 caracteres',
                'price.min' => 'En el campo :attribute deben ingresarse un valor positivo',
                'stock.min' => 'En el campo :attribute deben ingresarse un valor mayor o igual a 0',
            ]
        );

        if(isset($request['image'])){
            @unlink(public_path('product_img/') . $Product->image);
            $imageName = time() . '.' . $request['image']->getClientOriginalExtension();
            $request['image']->move(public_path('product_img/'), $imageName);
            $Product->image = $imageName;
        }


        $Product->name = $request['name'];
        $Product->price = $request['price'];
        $Product->stock = $request['stock'];
        $Product->description = $request['description'];
        $Product->category_id = $request['category_id'];
        $Product->mark_id = $request['mark_id'];

        $Product->save();

        return redirect('adminProducts');
    }

    /**
     * Show the confirmation form for destroying the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Product = Product::find($id);
        return view('deleteProduct', compact('Product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::find($id);
        @unlink(public_path('product_img/') . $Product->image);
        $Product->delete();
        return redirect('/adminProducts');
    }
    public function deleteAltImage($id=null){
       $productImage = ProductsImages::where(['id'=>$id])->first();

       $image_path = 'product_img/';
       if(file_exists($image_path.$productImage->image)){
           unlink($image_path.$productImage->image);
       }
       ProductsImages::where(['id'=>$id])->delete();
       Alert::success('Deleted','Success Message');
       return redirect()->back();
   }

   public function list() // listar productos para el cliente
   {   
       $pagination = 3;
       $Categories = Category::all();
       $CategoryName = $Categories->first()->name;
       if (request()->Category){
         $Products = Product::with('category')->whereHas('category',function($query){
                                                                    $query -> where( 'name', request()->Category);});
          $Marks =Mark::all();
          $CategoryName = $Categories->where('name',request()->Category)->first()->name;
          $SearchTitle = $CategoryName;
       } else{
         $Products = Product::take(12);
         $Marks =Mark::all();
         $SearchTitle ='Featured';
       }

        if(request()->sort == 'low_high'){
            $Products= $Products -> orderBy('price')->paginate($pagination);
            // $Products->values()->all();
        }
      else if(request()->sort == 'high_low' ){
        $Products= $Products -> orderBy('price','desc')->paginate($pagination);
        // $Products->values()->all();
               } else{
                       $Products = $Products -> paginate($pagination);
                     }


       return view('/products', compact('Products' , 'Categories' , 'Marks','CategoryName','SearchTitle'));
   }

// MOTOR DE BUSQUEDA (PRODUCTOS O CATEGORIAS)
public function search() 
   {
     
       $q = Input::get ( 'q' );
       $Search = Product::where('name','LIKE','%'.$q.'%')->get();
      
       // buscador por categoria
       if(count($Search)<1){
       $Categories = Category::where('name','LIKE','%'.$q.'%');
       $IdCategories= $Categories->first()->id;
       $Products = Product::where('category_id',$IdCategories);
       $SearchTitle = $Categories->first()->name;
       
       }
       //BUSCA POR producto:
       else{
       $Products = Product::where('name','LIKE','%'.$q.'%');       
       $IdMark= $Products->first()->mark_id;
       $SearchTitle = Mark::where('id',$IdMark)->first()->name;
        }  

       $Categories = Category::all();
       $CategoryName = $Categories->first()->name;
       $Marks =Mark::all();
       $Products = $Products -> paginate(9);

       return view('/products', compact('Products' , 'Categories' , 'Marks','CategoryName','SearchTitle'));
   }

public function addImages (Request $request,$id=null){
  $ProductDetails = Product::where(['id' => $id])->first();
  if ($request->isMethod('post')) {
    $data = $request ->all();
    if($request->hasfile('image')){
      $files = $request ->file('image');
      foreach ($files as $file) {
        $image = new ProductsImages;
        $extension = $file ->getClientOriginalExtension();
        $filename = rand(111,9999).'.'.$extension;
        $image_path = (public_path('product_img/') . $filename);
        Image::make($file)->save($image_path);
        $image->image = $filename;
        $image->product_id = $data['product_id'];
        $image->save();
      }
    }
    return redirect('addImages/'.$id)->with('flash_message_success','Se agrego la imagen ');
  }
  $productImages = ProductsImages::where(['product_id'=>$id])->get();
  return view ('addImages')->with(compact('ProductDetails','productImages'));
}

// public function products($id=null){
//   $productsAltImages = ProductsImages::where('product_id',$id)->get();
//   return view('/product-detail')->with(compact('productDetails','ProductsAltImages'));
// }


}
