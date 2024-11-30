<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstandarPost;
use App\Http\Requests\UpdateEstandarPut;
use App\Models\Estandar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ControllerEstandar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $estandares = Estandar::orderBy("id");
        $estandar = "";
        if (request()->has("estandar")) {
            $estandar = request("estandar");
            $estandares = $estandares->where('estandar', 'like', '%' . $estandar . "%");
        }

        $estandares = $estandares->paginate(5)->appends(request()->except("page"));
        return Inertia::render('Estandar/Index', compact('estandares', 'estandar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Estandar/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstandarPost $request)
    {
        //
        Estandar::create($request->validated());

        // return Inertia::render('User/Create')->with('message', 'Usuario Creado');
        return Redirect::route('estandar.index')->with('message', 'Estandar Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estandar $estandar)
    {
        //
        return Inertia::render('Estandar/Show', compact('estandar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estandar $estandar)
    {
        //
        return Inertia::render('Estandar/Edit', compact('estandar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstandarPut $request, Estandar $estandar)
    {
        //
        $estandar->update($request->validated());
        if (request()->hasFile('actividades')) {
            $estandar->updateProfilePhoto(request()->file("actividades"));
        }
        return Redirect::route('estandar.index', $estandar)->with('message', 'Estandar Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estandar $estandar)
    {
        //
        $estandar->delete();
        // request()->session()->flash('message', 'Mensaje de prueba');
        // return Redirect()->back()->with('message', 'Usuario Eliminado');
        return Redirect::route('estandar.index')->with('message', 'Estandar Eliminado');
    }
}
