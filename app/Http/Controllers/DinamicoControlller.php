<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDinamicoPost;
use App\Http\Requests\UpdateAuditoriaPut;
use App\Models\Dinamico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DinamicoControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dinamicos = Dinamico::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $dinamicos = $dinamicos->where('nombre', 'like', '%' . $nombre . "%");
        }
        $dinamicos = $dinamicos->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Dinamico/Index', compact('dinamicos', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Dinamico/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDinamicoPost $request)
    {
        //
        Dinamico::create($request->validated());
        return Redirect::route('dinamico.index')->with('message', 'Dinamico Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dinamico $dinamico)
    {
        //
        return Inertia::render('Dinamico/Show', compact('dinamico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dinamico $dinamico)
    {
        //
        return Inertia::render('Dinamico/Edit', compact('auditorium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuditoriaPut $request, Dinamico $dinamico)
    {
        //
        $dinamico->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('dinamico.index', $dinamico)->with('message', 'Dinamico Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dinamico $dinamico)
    {
        //
        $dinamico->delete();
        return Redirect::route('dinamico.index')->with('message', 'Dinamico Eliminado');
    }
}