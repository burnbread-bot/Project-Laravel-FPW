<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('master-data.product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
 
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

}