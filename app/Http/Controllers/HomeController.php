<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $products = \App\Models\Product::latest()->take(8)->get(); // contoh: 8 produk terbaru
    return view('home', compact('products'));
}

}
