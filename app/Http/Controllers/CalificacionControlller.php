<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalificacionPost;
use App\Http\Requests\UpdateCalificacionPut;
use App\Models\Calificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CalificacionControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $calificaciones = Calificacion::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $calificaciones = $calificaciones->where('nombre', 'like', '%' . $nombre . "%");
        }
        $calificaciones = $calificaciones->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Calificacion/Index', compact('calificaciones', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Calificacion/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCalificacionPost $request)
    {
        //
        Calificacion::create($request->validated());
        return Redirect::route('calificacion.index')->with('message', 'Calificacion Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calificacion $calificacion)
    {
        //
        return Inertia::render('Calificacion/Show', compact('calificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calificacion $calificacion)
    {
        //
        return Inertia::render('Calificacion/Edit', compact('calificacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCalificacionPut $request, Calificacion $calificacion)
    {
        //
        $calificacion->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('calificacion.index', $calificacion)->with('message', 'Calificacion Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calificacion $calificacion)
    {
        //
        $calificacion->delete();
        return Redirect::route('calificacion.index')->with('message', 'Calificacion Eliminado');
    }
}