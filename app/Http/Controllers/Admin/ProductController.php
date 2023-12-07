<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // partiamo dai prodotti e li filtriamo tramite where con l'id del ristorante è uguale al id dell utente loggato ? vuol dire che se non lo trova mi da null
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|min:2',
            'description' => 'nullable|max:1000|min:2',
            'price' => 'nullable|min:2',
            'cover_image' => 'nullable|mimes:jpg,bmp,png|max:300',
            'ingredients' => 'required|max:1000|min:2',
        ]);

        $product = new Product();



        if ($request->has('cover_image')) {
            $file_path =  Storage::disk('public')->put('product_images', $request->cover_image);
            $product->cover_image = $file_path;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->ingredients = $request->ingredients;
        $product->is_available = $request->is_available;
        $product->restaurant_id = Restaurant::where('user_id', Auth::user()->id)->first()?->id;






        $product->save();

        // IMPORTANTE: prima di usare atach, bisogna eseguire il save del prodotto, senò non funziona!

        // $product->orders()->attach($request->orders);

        return to_route('admin.products.index');
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
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|min:2',
            'description' => 'nullable|max:1000|min:2',
            'price' => 'nullable|min:2',
            'cover_image' => 'nullable|mimes:jpg,bmp,png|max:300',
            'ingredients' => 'required|max:1000|min:2',
        ]);

        $data = $request->all();

        if ($request->has('cover_image')) {
            $file_path =  Storage::disk('public')->put('product_images', $request->cover_image);

            // prendo il $data, che contiene tutte le richieste, seleziono il thumb e gli dico che è ugiuale a $file_path


            $data['cover_image'] = $file_path;
        }

        // aggiorno i dati del mio progetto

        $product->update($data);

        return redirect()->route('admin.products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('messaggio', 'hai cancellato il piatto con successo!');
    }
}
