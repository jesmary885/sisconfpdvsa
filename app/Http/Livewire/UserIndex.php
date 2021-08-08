<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
Use Livewire\WithPagination;

class UserIndex extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orwhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate();
        return view('livewire.user-index',compact('users'));
    }
}
