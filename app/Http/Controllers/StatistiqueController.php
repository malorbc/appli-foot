<?php

namespace App\Http\Controllers;

use App\Models\Statistique;
use App\Models\User;
use App\Http\Requests\StoreStatistiqueRequest;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index()
    {
        return view('statistiques.index');
    }

    public function create()
    {
        $club_id = auth()->user()->club_id;
        $users = User::where('club_id', $club_id)->get()/*->whereIn('role', 'joueur')*/;
        return view('statistiques.create', compact('users'));
    }

    public function store(StoreStatistiqueRequest $request)
    {
        $statistique = Statistique::create([
            'value' => $request->value,
            'date' => $request->date,
            'type' => 1,
            'user_id' => $request->user,
            'type_id' => 0
        ]);
        $statistique->save();
        return redirect()->route('statistiques.index');
    }
}
