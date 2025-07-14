<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang kosong.');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.user')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function adminIndex()
    {
        $orders = Order::with('user')->latest()->get();
        return view('orders.admin-orders', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|string']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status diperbarui.');
    }
}
