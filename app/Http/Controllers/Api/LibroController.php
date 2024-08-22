<?php

namespace App\Http\Controllers\Api;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Requests\LibroRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\LibroResource;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $libros = Libro::paginate();

        return LibroResource::collection($libros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LibroRequest $request): Libro
    {
        return Libro::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro): Libro
    {
        return $libro;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LibroRequest $request, Libro $libro): Libro
    {
        $libro->update($request->validated());

        return $libro;
    }

    public function destroy(Libro $libro): Response
    {
        $libro->delete();

        return response()->noContent();
    }
}
