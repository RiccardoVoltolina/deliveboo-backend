<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index() {
      
        $restaurants = Auth::user()->restaurant;

        
        return view('admin.products.dashboard', compact('restaurants'));
    }
}
