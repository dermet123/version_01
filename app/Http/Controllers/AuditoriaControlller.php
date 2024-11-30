<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuditoriaPost;
use App\Http\Requests\UpdateAuditoriaPut;
use App\Models\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AuditoriaControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $auditorias = Auditoria::orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $auditorias = $auditorias->where('nombre', 'like', '%' . $nombre . "%");
        }
        $auditorias = $auditorias->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Auditoria/Index', compact('auditorias', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Auditoria/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuditoriaPost $request)
    {
        //
        Auditoria::create($request->validated());
        return Redirect::route('auditoria.index')->with('message', 'Auditoria Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auditoria $auditorium)
    {
        //
        return Inertia::render('Auditoria/Show', compact('auditorium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auditoria $auditorium)
    {
        //
        return Inertia::render('Auditoria/Edit', compact('auditorium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuditoriaPut $request, Auditoria $auditorium)
    {
        //
        $auditorium->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        return Redirect::route('auditoria.index', $auditorium)->with('message', 'Auditoria Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auditoria $auditorium)
    {
        //
        $auditorium->delete();
        return Redirect::route('auditoria.index')->with('message', 'Auditoria Eliminado');
    }
}