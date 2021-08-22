<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.cambiar_contrasena');
    }

    public function update(Request $request)
    {
      
        // $this->validate($request, [
        //     'password' => 'required|confirmed|min:6|max:32',
        // ]);

        // $user = User::user(); 

        // $password = bcrypt($request->password); 
        // $user->password = $password; 
        // $user->save(); 
        // return redirect()->back()->withSuccess('Password actualizado');
    }
}
