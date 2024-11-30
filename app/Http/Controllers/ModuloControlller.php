<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuloPost;
use App\Http\Requests\UpdateModuloPut;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ModuloControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modulos = Modulo::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $modulos = $modulos->where('nombre', 'like', '%' . $nombre . "%");
        }
        $modulos = $modulos->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Modulo/Index', compact('modulos', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Modulo/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuloPost $request)
    {
        //
        Modulo::create($request->validated());
        return Redirect::route('modulo.index')->with('message', 'Modulo Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modulo $modulo)
    {
        //
        return Inertia::render('Modulo/Show', compact('modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modulo $modulo)
    {
        //
        return Inertia::render('Modulo/Edit', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuloPut $request, Modulo $modulo)
    {
        //
        $modulo->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('modulo.index', $modulo)->with('message', 'Modulo Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modulo $modulo)
    {
        //
        $modulo->delete();
        return Redirect::route('modulo.index')->with('message', 'Modulo Eliminado');
    }
}