<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return Inertia::render('ProductDetails', ['product' => $product]);
    }
}