<?php

namespace App\Http\Livewire;

use App\Models\Club;
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
            $this->users = Club::where('name', 'like', $words)->get();
        }

        // dd($this->users);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
