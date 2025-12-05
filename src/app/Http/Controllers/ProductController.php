<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function update(Request $request, $productId)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        dd($file_name);
    }

    public function destroy($productId)
    {
        Product::find($productId)->delete();
        return redirect('/products');
    }
}
