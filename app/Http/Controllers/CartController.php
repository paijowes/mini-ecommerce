<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    public function add(Request $req, Product $product) {
        $cart = session()->get('cart', []);
        $id = $product->id;
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => ($cart[$id]['quantity'] ?? 0) + 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }
    public function remove(Request $req, $id) {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang');
    }
}
