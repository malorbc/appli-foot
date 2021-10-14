<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function index()
    {
        return view('profil.index');
    }

    public function edit(User $user)
    {
        dd($user);
        return view('profil.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        if ($request->image == null) {
            $request->only(['name', 'naissance', 'surname']);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'naissance' => ['required', 'string'],
            'surname' => ['required', 'string', 'max:255'],
            'image' => ['sometimes', 'image']
        ]);

        $args = [
            'name' => $request->name,
            'surname' => $request->surname,
            'naissance' => $request->naissance
        ];

        if ($request->image != null) {
            $imageName = $request->image->store('users');
            $args = array_merge($args, [
                'image' => $imageName
            ]);
        }
        $user->update($args);;
        return redirect()->route('profil.index')->with('success', 'profil modifié');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'surname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:255'],
            'image' => ['mimes:jpeg,jpg,png']
        ]);

        $imageName = $request->image->store('users');

        $args = [
            'name' => $request->name,
            'email' => $request->email,
            'surname' => $request->surname,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'naissance' => $request->naissance,
            // 'image' => $imageName
            'image' => 'users/default.png'
        ];

        if ($request->role == 'joueur') {
            $args['poste'] = $request->poste;
        } else {
            $args['poste'] = '';
        }

        $user = User::create($args);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
