<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCriterioPost;
use App\Http\Requests\UpdateCriterioPut;
use App\Models\Criterio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CriterioControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $criterios = Criterio::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $criterios = $criterios->where('nombre', 'like', '%' . $nombre . "%");
        }
        $criterios = $criterios->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Criterio/Index', compact('criterios', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Criterio/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCriterioPost $request)
    {
        //
        Criterio::create($request->validated());
        return Redirect::route('criterio.index')->with('message', 'Criterio Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Criterio $criterio)
    {
        //
        return Inertia::render('Criterio/Show', compact('criterio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criterio $criterio)
    {
        //
        return Inertia::render('Criterio/Edit', compact('criterio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCriterioPut $request, Criterio $criterio)
    {
        //
        $criterio->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('criterio.index', $criterio)->with('message', 'Criterio Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criterio $criterio)
    {
        //
        $criterio->delete();
        return Redirect::route('criterio.index')->with('message', 'Criterio Eliminado');
    }
}