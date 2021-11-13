<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClubRequest;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        //
    }

    public function accept($id)
    {
        $request = ClubRequest::findOrFail($id);
        $args = [
            'status' => 1
        ];

        $userId = $request->user_id;
        $clubId = $request->club_id;
        $argsUpdateUser = [
            'club_id' => $clubId
        ];

        if ($clubId == auth()->user()->club_id) {
            $user = User::findOrFail($userId);
            $user->update($argsUpdateUser);
            $user->save();
            $request->update($args);
            return redirect()->route('dashboard');
        } else {
            abort(403, 'Accès interdit');
        }
    }

    public function deny($id)
    {
        $request = ClubRequest::findOrFail($id);
        $clubId = $request->club_id;

        if ($clubId == auth()->user()->club_id) {
            ClubRequest::destroy($id);
            return redirect()->route('dashboard');
        } else {
            abort(403, 'Accès interdit');
        }
    }
}
