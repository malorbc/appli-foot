<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClubRequest;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function create()
    {
        return view('admin.clubs.create');
    }

    public function store(StoreClubRequest $request)
    {


        $club = Club::create([
            'name' => $request->name
        ]);

        $userId = auth()->user()->id;
        $currentUser = User::findOrFail($userId);
        $currentUser->update(['club_id', $club->id]);

        $currentUser->club_id = $club->id;
        $currentUser->save();

        return redirect()->route('dashboard')->with('success', 'Votre post a été créé');
    }

    public function edit(Club $club)
    {
        if ($club->id == auth()->user()->club_id) {
            return view('admin.clubs.edit', compact('club'));
        } else {
            abort(403, 'Accès interdit');
        }
    }

    public function update(StoreClubRequest $request, Club $club)
    {
        $arrayUpdate = [
            'name' => $request->name
        ];

        $club->update($arrayUpdate);
        return redirect()->route('dashboard')->with('success', 'club modifié');
    }
}
