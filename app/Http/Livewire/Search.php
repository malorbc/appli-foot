<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $query;
    public $users = [];
    public $selectedIndex = 0;

    public function incrementIndex()
    {
        $this->selectedIndex++;
    }

    public function decrementIndex()
    {
        $this->selectedIndex--;
    }

    public function updatedQuery()
    {
        if (strlen($this->query) > 2) {
            $words = '%' . $this->query . '%';
            $this->users = User::where('name', 'like', $words)
                ->orWhere('email', 'like', $words)
                ->get();
        }

        // dd($this->users);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
