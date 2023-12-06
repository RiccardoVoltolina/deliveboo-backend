<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // partiamo dai prodotti e li filtriamo tramite where con l'id del ristorante è uguale al id dell utente loggato
        // dd(Restaurant::where('user_id', Auth::user()->id)->first()?->id);
        if (Restaurant::where('user_id', Auth::user()->id)->first()?->id) {
            $products =  Product::where('restaurant_id',  Restaurant::where('user_id', Auth::user()->id)->first()->id)->get();
            return view("admin.products.index", compact('products'));

        } else {
            $message = 'non hai un ristorante';
            return view("admin.products.index", compact('message'));
        }


        // dd($products[0]->id);


        // ritornano i dati dell'utente loggato, con le sue informazioni
        
        // $products = Auth::user()->restaurant()->products;

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $val_data = $request->validated();
        $product=Product::create($val_data);
        return to_route('admin.products.index')->with('message', 'New Product Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $val_data = $request->validated();

        $product->update($val_data);

        return to_route('admin.products.index')->with('message', 'Products updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('admin.products.index')->with('message', 'Product deleted succesfully!');
    }
}
