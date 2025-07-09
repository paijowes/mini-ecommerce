<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller {
    public function index() {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }
    public function process(Request $req) {
        $cart = session()->get('cart', []);
        if(!$cart) return redirect()->route('products.index');
        $total = collect($cart)->sum(fn($item)=> $item['price'] * $item['quantity']);
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'paid'
        ]);
        foreach($cart as $id=>$item){
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$id,
                'quantity'=>$item['quantity'],
                'price'=>$item['price']
            ]);
            Product::where('id', $id)->decrement('stock', $item['quantity']);
        }
        session()->forget('cart');
        return view('checkout.success', compact('order'));
    }
}
