<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPasswordController extends Controller
{
    public function showForm(Request $request)
    {
        return view('users.passwordform');
    }

    public function update(Request $request)
    {
      
        $this->validate($request, [
            'password' => 'required|confirmed|min:6|max:32',
        ]);

        $user = Auth::user(); 

        $password = bcrypt($request->password); 
        $user->password = $password; 
        $user->save(); 
        return redirect()->back()->withSuccess('Password actualizado');
    }
}
