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
    public $sortField ='id';
    public $sortAsc = 'desc';

    protected $listeners = ['render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orwhere('email', 'LIKE', '%' . $this->search . '%')
                    ->orderBy($this->sortField, $this->sortAsc)
                    ->paginate(6);
        return view('livewire.user-index',compact('users'));
    }
}
