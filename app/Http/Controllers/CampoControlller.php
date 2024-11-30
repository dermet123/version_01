<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampoPost;
use App\Http\Requests\UpdateAuditoriaPut;
use App\Models\Campo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CampoControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $campos = Campo::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $campos = $campos->where('nombre', 'like', '%' . $nombre . "%");
        }
        $campos = $campos->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Campo/Index', compact('campos', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Campo/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampoPost $request)
    {
        //
        Campo::create($request->validated());
        return Redirect::route('campo.index')->with('message', 'Campo Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campo $campo)
    {
        //
        return Inertia::render('Campo/Show', compact('auditorium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campo $campo)
    {
        //
        return Inertia::render('Campo/Edit', compact('auditorium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuditoriaPut $request, Campo $campo)
    {
        //
        $campo->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('campo.index', $campo)->with('message', 'Campo Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campo $campo)
    {
        //
        $campo->delete();
        return Redirect::route('campo.index')->with('message', 'Campo Eliminado');
    }
}