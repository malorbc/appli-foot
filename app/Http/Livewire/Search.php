<?php

namespace App\Http\Livewire;

use App\Models\Club;
use App\Models\User;
use App\Models\ClubRequest;
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

    public function setClubToUser($idClub)
    {
        $userId = auth()->user()->id;
        $args = [
            "user_id" => $userId,
            "club_id" => $idClub,
            "status" => 0,
        ];
        ClubRequest::where('user_id', $userId)->delete();
        $clubrequest = ClubRequest::create($args);
        $clubrequest->save();
        return redirect()->route('dashboard')->with('success', 'Vous êtes enregistrés dans le club');
    }

    public function render()
    {
        return view('livewire.search');
    }
}
