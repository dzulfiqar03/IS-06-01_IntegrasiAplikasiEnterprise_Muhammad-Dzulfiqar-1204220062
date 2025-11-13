<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResources;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        return response()->json([
            'success' => true,
            'message' => 'book ditemukan',
            'data'    => BookResources::collection($book),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'        => 'required|string|max:255',
            'pengarang' => 'nullable|string',
            'penerbit' => 'nullable|string',
            'tahun_terbit'  => 'required|numeric|min:0',
            'jumlah_halaman' => 'required|integer|min:0',
            'kategori'    => 'nullable|string|max:100',
            'isbn'       => 'required|integer|min:0',
            'status'    => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $book = Book::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil dibuat',
            'data' => Book::latest()->get()
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Buku ditemukan',
            'data' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
         $validator = Validator::make($request->all(), [
            'judul'        => 'required|string|max:255',
            'pengarang' => 'nullable|string',
            'penerbit' => 'nullable|string',
            'tahun_terbit'  => 'required|numeric|min:0',
            'jumlah_halaman' => 'required|integer|min:0',
            'kategori'    => 'nullable|string|max:100',
            'isbn'       => 'required|integer|min:0',
            'status'    => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        };
        $book = Book::find($id);
        $book->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil diupdate',
            'data' => $book
        ],200);
    }

    public function destroy(String $id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil dihapus',
            'data' => Book::latest()->get()
        ]);
    }
}
