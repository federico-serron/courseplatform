<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    // Telling livewire I'll work with bootstrap, so the pagination works.
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate(8);

        return view('livewire.admin.users-index', compact('users'));
    }

    // Clearing the $page property from model WithPagination, so when the user looks for a register from a different page, it works.
    public function clear_page(){
        $this->reset('page');
    }
}
