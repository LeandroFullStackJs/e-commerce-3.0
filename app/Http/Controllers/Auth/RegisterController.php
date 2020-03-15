<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => 'mimes:jpg,jpeg,png,svg,gif', 
            'dni' => ['required', 'numeric', 'unique:users'],
            'birthdate' => ['required', 'before:18 years ago'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string']
        ], [
            'required' => 'Completar campo',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'email' => 'Formato de email incorrecto',
            'email.unique' => 'Ya existe un usuario con el email ingresado',
            'dni.unique' => 'Ya existe un usuario con el dni ingresado',
            'mimes' => 'Tiene que ser un archivo con una de las siguientes extensiones: .jpg, .png, .gif, .svg',
            'before' => 'Tienes que ser mayor a 18 años'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $imageName = 'perfil';
        if(isset($data['image'])){
            $imageName = time() . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('user_img/'), $imageName);
        }

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthdate' => $data['birthdate'],
            'phone' => $data['phone'],
            'dni' => $data['dni'],
            'address' => $data['address'],
            'image' => $imageName
        ]);
    }
}
