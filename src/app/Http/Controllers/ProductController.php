<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;
use Illuminate\View\Component;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seasons')->paginate(6);
        return view('products.index', compact('products'));
    }

    public function detail(Product $product)
    {
        $seasons = Season::all();
        return view('products.detail', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('', $file_name, 'public');
        $update_product = $request->only('name', 'price', 'description');
        $update_product['image'] = 'storage/' . $file_name;
        $product->update($update_product);
        $product->seasons()->sync($request->seasons);
        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

    public function register()
    {
        $seasons = Season::all();
        return view('products.register', compact('seasons'));
    }

    public function create(ProductRequest $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('', $file_name, 'public');
        $create_product = $request->only('name', 'price', 'description');
        $create_product['image'] = 'storage/' . $file_name;
        $product = Product::create($create_product);
        $product->seasons()->attach($request->seasons);
        return redirect('/products');
    }

    public function search(Request $request)
    {
        $products = Product::with('seasons')->KeywordSearch($request->keyword)->paginate(6);
        $old_data = $request->only('keyword', 'sort_status');
        $products->appends($old_data);
        return view('products.index', compact('products', 'old_data'));
    }
}
