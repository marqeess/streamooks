<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('auth.login-adm');
    }

    public function postLogin(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|min:3|max:100',
            'password' => 'required|min:3|max:100'
        ]);

        if($validator->fails() ) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

        if ( auth()->guard('admin')->attempt($credentials) )
        {
            return redirect('/admin');
        } else {
            return redirect('/admin/login')
                ->withErrors(['errors' => 'Login Invalido'])
                ->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect ('admin/login');
    }
}
