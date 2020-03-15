<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customers = Customer::all();
        return view('adminCustomers', compact('Customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $User = Auth::user();
        if($User == null){
            return redirect('/login');
        }
        return view('/profile', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Customer = Customer::find($request['id']);

        $newPass = "";
        if(strlen($request['password']) > 0){
            $newPass = 'required|string|min:8|confirmed';
        }

        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$Customer->id,
            'password' => $newPass,
            'image' => 'mimes:jpg,jpeg,png,svg,gif',
            'dni' => 'required|numeric|unique:users,dni,'.$Customer->id,
            'birthdate' => 'required|before:18 years ago',
            'phone' => 'required|numeric',
            'address' => 'required|string'
        ], [
            'required' => 'Completar campo',
            'email' => 'Formato de email incorrecto',
            'email.unique' => 'Ya existe un usuario con el email ingresado',
            'dni.unique' => 'Ya existe un usuario con el dni ingresado',
            'mimes' => 'Tiene que ser un archivo con una de las siguientes extensiones: .jpg, .png, .gif, .svg',
            'before' => 'Tienes que ser mayor a 18 años'
        ]);

        if(isset($request['image'])){
            @unlink(public_path('user_img/') . $Customer->image);
            $imageName = time() . '.' . $request['image']->getClientOriginalExtension();
            $request['image']->move(public_path('user_img/'), $imageName);
            $Customer->image = $imageName;
        }

        $Customer->first_name = $request['first_name'];
        $Customer->last_name = $request['last_name'];
        $Customer->email = $request['email'];
        $Customer->password = Hash::make($request['password']);
        $Customer->dni = $request['dni'];
        $Customer->birthdate = $request['birthdate'];
        $Customer->phone = $request['phone'];
        $Customer->address = $request['address'];

        $Customer->save();
        Alert::success('Updates', 'Datos actualizados correctamente');

        return redirect('/profile');
    }

    /**
     * Show the confirmation form for destroying the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Customer = Customer::find($id);
        return view('deleteCustomer', compact('Customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Customer = Customer::find($id);
        @unlink(public_path('Customer_img/') . $Customer->image);
        $Customer->delete();
        return redirect('/adminCustomers');
    }
}
