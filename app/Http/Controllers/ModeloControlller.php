<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModeloPost;
use App\Http\Requests\UpdateModeloPut;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ModeloControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modelos = Modelo::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $modelos = $modelos->where('nombre', 'like', '%' . $nombre . "%");
        }
        $modelos = $modelos->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Modelo/Index', compact('modelos', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Modelo/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModeloPost $request)
    {
        //
        Modelo::create($request->validated());
        return Redirect::route('modelo.index')->with('message', 'Modelo Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
        return Inertia::render('Modelo/Show', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        //
        return Inertia::render('Modelo/Edit', compact('modelo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModeloPut $request, Modelo $modelo)
    {
        //
        $modelo->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('modelo.index', $modelo)->with('message', 'Modelo Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        //
        $modelo->delete();
        return Redirect::route('modelo.index')->with('message', 'Modelo Eliminado');
    }
}