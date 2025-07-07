<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $orders = Order::with('items.product')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
}
