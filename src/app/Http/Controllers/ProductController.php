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
}
