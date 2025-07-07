<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales   = Order::sum('total');
        $orderCount   = Order::count();
        $productCount = Product::count();
        $newCustomers = User::where('created_at', '>=', now()->subMonth())->count();
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('dashboard', compact('totalSales', 'orderCount', 'productCount', 'newCustomers', 'recentOrders'));
    }
}
