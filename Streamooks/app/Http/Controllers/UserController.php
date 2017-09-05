<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Gate;

class UserController extends Controller
{
    //Verifica a URL do email e confirma email e token com o do banco de dados 
    public function confirmar($email, $token)
    {
        $users = DB::table('users')
                     ->where('email', '=', $email)
                     ->get();
                 
        if($users[0]->email == $email and $users[0]->token == $token ){
           
            $usuarios = User::find($users[0]->id);
            $usuarios->status = 1;
            $usuarios->save();
            return redirect('home');

        } else {
            
            return redirect('home');
        }

                    
    }
}
