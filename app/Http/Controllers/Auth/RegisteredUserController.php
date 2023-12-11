<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Typology;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Mostra la vista di registrazione.
     */
    public function create(): View
    {
        $typologies = Typology::all()->sortBy('typology');

        return view('auth.register', compact('typologies'));
    }

    /**
     * Gestisce una richiesta di registrazione in arrivo.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:255'],
            'vat' => ['required', 'string', 'max:255'],
            'cover_image' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'typology' => '',
            'address' => $request->address,
            'vat' => $request->vat,
            'cover_image' => $request->cover_image,
            
        ]);

        if ($request->has('typologies')) {

            $user->typology()->sync($request->typologies);

        } 
        // dd($request);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
