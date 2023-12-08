<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Typology;

class OwnerController extends Controller
{
    public function index() {
        // Ottenere il ristorante dell'utente autenticato
        $restaurant = Auth::user()->restaurant;

        // Verifica se l'utente ha associato un ristorante
        if ($restaurant) {
            // Ottenere le tipologie associate al ristorante
            $typologies = $restaurant->typologies;

            // Ottenere l'utente autenticato
            $user = Auth::user();

            return view('admin.products.dashboard', compact('restaurant', 'typologies', 'user'));
        } else {
            // Gestire il caso in cui l'utente non ha associato un ristorante
            return view('admin.products.dashboard', ['restaurant' => null, 'typologies' => null, 'user' => Auth::user()]);
        }
    }
}
