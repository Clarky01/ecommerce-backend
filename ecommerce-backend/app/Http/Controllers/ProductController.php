<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        return Product::all();
    }
public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'barcode' => 'required|string|unique:products,barcode',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category' => 'required|string',
    ]);

    // Create the product
    $product = Product::create($request->all());

    // Return a response
    return response()->json($product, 201);
}
}


function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'price' => 'nullable|numeric',
        'quantity' => 'nullable|integer',
        'description' => 'nullable|string',
        'name' => 'nullable|string',
        'category' => 'nullable|string',
    ]);

    // Find the product
    $product = Product::findOrFail($id);

    // Update the product
    $product->update($request->all());

    // Return a response
    return response()->json($product, 200);
}
    