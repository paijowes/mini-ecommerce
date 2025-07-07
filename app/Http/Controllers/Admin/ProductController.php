<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
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
        return view('admin.products.create');
    }
    public function store(Request $req){
        $data = $req->validate([
            'name'=>'required',
            'description'=>'nullable',
            'price'=>'required|numeric',
            'image'=>'nullable|url'
        ]);
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Produk dibuat');
    }
    public function edit(Product $product){
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $req, Product $product){
        $data = $req->validate([
            'name'=>'required',
            'description'=>'nullable',
            'price'=>'required|numeric',
            'image'=>'nullable|url'
        ]);
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success','Produk diperbarui');
    }
    public function destroy(Product $product){
        $product->delete();
        return back()->with('success','Produk dihapus');
    }
}
