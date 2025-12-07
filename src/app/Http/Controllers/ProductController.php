<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seasons')->paginate(6);
        return view('products.index', compact('products'));
    }

    public function detail($productId)
    {
        $product = Product::with('seasons')->find($productId);
        $seasons = Season::all();
        return view('products.detail', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request, $productId)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('', $file_name, 'public');
        $product = Product::with('seasons')->find($productId);
        $update_product = $request->only('name', 'price', 'description');
        $update_product['image'] = 'storage/' . $file_name;
        $product->update($update_product);
        $product->seasons()->sync($request->seasons);
        return redirect('/products');
    }

    public function destroy($productId)
    {
        Product::find($productId)->delete();
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
}
