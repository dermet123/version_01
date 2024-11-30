<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEscuelaPost;
use App\Http\Requests\UpdateEscuelaPut;
use App\Models\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $escuelas = Escuela::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $escuelas = $escuelas->where('nombre', 'like', '%' . $nombre . "%");
        }
        $escuelas = $escuelas->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Escuela/Index', compact('escuelas', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Escuela/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEscuelaPost $request)
    {
        //
        Escuela::create($request->validated());
        return Redirect::route('escuela.index')->with('message', 'Escuela Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Escuela $escuela)
    {
        //
        return Inertia::render('Escuela/Show', compact('escuela'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escuela $escuela)
    {
        //
        return Inertia::render('Escuela/Edit', compact('escuela'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEscuelaPut $request, Escuela $escuela)
    {
        //
        $escuela->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('escuela.index', $escuela)->with('message', 'Programa de Estudios Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Escuela $escuela)
    {
        //
        $escuela->delete();
        return Redirect::route('escuela.index')->with('message', 'Escuela Eliminado');
    }
}