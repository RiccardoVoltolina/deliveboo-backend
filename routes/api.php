<?php

use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
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

Route::get('restaurants', function(){
    // $restaurants =  Restaurant::all();

    // foreach ($restaurants as $restaurant) {

    //     $products = $restaurant->products;

    // }
    return response()->json([
        'success' => true,
        'result' => Restaurant::with(['typologies', 'products'])->orderByDesc('id')->paginate(10)
    ]);
});

// Route::get('restaurants', function(){
//     return response()->json([
//         'success' => true,
//         'result' => Product::all(),
//     ]);
// });