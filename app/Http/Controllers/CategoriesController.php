<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::all();
        return view('adminCategories', compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addCategory');
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
                'name' => 'required|unique:categories|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'La categoria ya se encuentra en la base de datos',
                'min' => 'Debe ingresar más de 2 letras',
                'max' => 'Debe ingresar menos de 20 letras'
            ]
        );


        $Category = new Category;
        $Category->name = $request['name'];

        $Category->save();

        return redirect('adminCategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category = Category::find($id);
         // return view('', compact('Category')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category = Category::find($id);
        return view('editCategory', compact('Category')); 
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
        $this->validate($request, 
            [
                'name' => 'required|unique:categories|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'La categoria ya se encuentra en la base de datos',
                'min' => 'Debe ingresar más de 2 letras',
                'max' => 'Debe ingresar menos de 20 letras'
            ]
        );


        $Category = Category::find($id);
        $Category->name = $request['name'];

        $Category->save();

        return redirect('adminCategories');
    }

     /**
     * Show the confirmation form for destroying the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Category = Category::find($id);
        return view('deleteCategory', compact('Category')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::find($id);
        $Category->delete();
        return redirect('/adminCategories');
    }
}
