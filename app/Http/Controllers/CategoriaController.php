<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;


class CategoriaController extends Controller
{
    public function listar(){
        $categorias=Categoria::all();
        return datatables()->of($categorias)
        ->addColumn('btn', 'categoria.action')
        ->rawColumns(['btn'])
        ->toJson();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("categoria.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categoria.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        $categoria=new Categoria();
        $categoria->categoria = $request->categoria;
        $categoria->estado=1;
        $categoria->save();
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view("categoria.edit",compact("categoria"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->categoria = $request->categoria;
        $categoria->save();
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
    public function eliminar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->eliminar();

        return response()->json(["id"=>"eliminado correctamente"]);
    }
    public function activar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->estado=1;
        $categoria->save();

        return response()->json(["respuesta"=>"Se dio de alta correctamente"]);
    }

    
}
