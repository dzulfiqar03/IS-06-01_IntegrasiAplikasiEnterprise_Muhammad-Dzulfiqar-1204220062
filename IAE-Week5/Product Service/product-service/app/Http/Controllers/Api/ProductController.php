<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::latest()->get(); //->mengambil product terbaru
        return response()->json([
            'success' => true,
            'message' => 'Product ditemukan',
            'data'    => ProductResource::collection($product),
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category'    => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $product = Product::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dibuat',
            'data' => Product::latest()->get()
        ], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produk ditemukan',
            'data' => $product
        ]);
    }

    public function update(Request $request, String $id)
    {
        $product = Product::find($id);
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category'    => 'nullable|string|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $product->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diupdate',
            'data' => $product
        ]);
    }
    public function destroy(String $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus',
            'data' => Product::latest()->get()
        ]);
    }
}
