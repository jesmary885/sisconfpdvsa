<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class ChangePass extends Component
{
    public $old_pass,$new_pass,$new_pass_c,$open;



    public function render()
    {
        return view('livewire.users.change-pass');
    }
}
