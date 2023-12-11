<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Typology;
use App\Models\User;

class OwnerController extends Controller
{
    public function index() {

            // Ottenere le tipologie associate al ristorante
            // $typologies = Auth::user()->typology_id;

            $user = Auth::user();


            $typologies =  $user->typologies;



            // Ottenere l'utente autenticato
            // dd($typologies);
            return view('admin.products.dashboard', compact('typologies', 'user'));
      
    }
}
