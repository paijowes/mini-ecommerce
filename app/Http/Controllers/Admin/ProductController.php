<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $req){
        $data = $req->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|url',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Produk dibuat');
    }
    public function edit(Product $product){
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }
    public function update(Request $req, Product $product){
        $data = $req->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|url',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success','Produk diperbarui');
    }
    public function destroy(Product $product){
        $product->delete();
        return back()->with('success','Produk dihapus');
    }
}
