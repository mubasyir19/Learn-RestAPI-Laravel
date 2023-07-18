<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProduct()
    {
        $product = Product::all();

        return response()->json([
            'Success' => true,
            'message' => 'Success get all products',
            'data' => $product
        ]);
    }

    public function addProduct(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json([
            'Success' => true,
            'message' => 'Success add product',
            'data' => $product
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return response()->json([
            'Success' => true,
            'message' => 'Success update data product',
            'data' => $product
        ]);
    }

    public function deleteProduct(Product $product, $id)
    {
        //$product = Product::where('id', $id)->whiTrashed()->delete();

        $product->delete($id);

        return response()->json([
            'message' => 'Product deleted'
        ]);
    }
}
