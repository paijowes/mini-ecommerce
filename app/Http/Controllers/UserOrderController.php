<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->where('user_id', Auth::id())->latest()->paginate(10);
        return view('profile.orders', compact('orders'));
    }
}
