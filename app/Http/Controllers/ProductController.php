<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List products with toolbar
    public function index()
    {
        $query = Product::query()->with('category');
        if ($search = $request->query('search')) {
            $query->where('name', 'like', "%{$search}%");
        }
        if ($category = $request->query('category')) {
            $query->where('category_id', $category);
        }
        $products = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();
        return view('products.index', compact('products','categories','search','category'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Store new product
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|url',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Product::create($data);

        return redirect()->route('products.index')
                         ->with('success', 'Product added successfully.');
    }

    // Show single product
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
