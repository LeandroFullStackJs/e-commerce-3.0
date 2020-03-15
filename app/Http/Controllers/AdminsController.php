<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminsController extends Controller
{
    public function logInForm(){
        return view('adminLogIn');
    }

    public function LogIn(Request $request){
        $Admin = Admin::where('user', '=', $request['user'])->get()->pop();
        if($Admin){
            if(password_verify($request['password'], $Admin->password)){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['admin'] = $Admin->user;
                return redirect('/admin');
            }
            return redirect('/adminLogIn')->withErrors('Contraseña incorrecta');
        }
        return redirect('/adminLogIn')->withErrors('Usuario no encontrado');
    }

    public function logOut(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        return redirect('/');
    }

    public function check(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        dd($_SESSION);
    }
}
