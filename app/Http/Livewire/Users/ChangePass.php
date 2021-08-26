<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePass extends Component
{
    public $password,$old_password,$password_confirmation;
    public $open = false;
    

    protected $rules = [
        'password' => 'required|string|min:8|confirmed',
    ];

    public function render()
    {
        return view('livewire.users.change-pass');
    }

    public function update_password(){

        $rules = $this->rules;
        $user = Auth::user();
        $usuario_auth = User::where('id',$user->id)->first();
        $this->validate($rules);

        if (Hash::check(($this->old_password), ($user->password))) {
            $usuario_auth->update([
                'password' => Hash::make($this->password)
                ]);

              $this->emit('alertShangePass');
             $this->reset('password','old_password','password_confirmation');

        }else{
            $this->emit('alertErrorShangePass');
            $this->reset('password','old_password','password_confirmation');
        }

    }
    public function close(){

       return redirect()->route('home');

    }
}
