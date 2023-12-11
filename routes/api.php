<?php

use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', function (Request $request) {
    return response()->json([
        'success' => true,
        'result' => Product::all()
    ]);
});




Route::get('restaurants', function () {
    return response()->json([
        'success' => true,
        'result' => Restaurant::all()
    ]);
});



// Route::get('restaurants/typology', function () {
//     return response()->json([
//         'success' => true,

//         // Ottieni il ristorante associato all'utente autenticato
//         $restaurants = Auth::user()->restaurant,

//         // Ottieni l'utente autenticato
//         $user = Auth::user(),


//         'result' => Auth::user()->$restaurants->typologies,

//     ]);
// });
