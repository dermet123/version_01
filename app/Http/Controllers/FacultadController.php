<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultadPost;
use App\Http\Requests\UpdateFacultadPut;
use App\Models\Escuela;
use App\Models\Facultad;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $facultades = Facultad::with('escuelas')->orderBy("id");

        $facultades = Facultad::with('escuelas')->orderBy("id");

        $nombre = "";
        if (request()->has("nombre")) {
            $nombre = request("nombre");
            $facultades = $facultades->where('nombre', 'like', '%' . $nombre . "%");
        }
        $facultades = $facultades->paginate(3)->appends(request()->except("page"));
        return Inertia::render('Facultad/Index', compact('facultades', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Obtener las escuelas que no están asociadas a ninguna facultad
        $escuelasDisponibles = Escuela::whereNull('facultad_id')->orderBy('nombre')->get();

        return Inertia::render('Facultad/Create', [
            'escuelas' => $escuelasDisponibles, // Pasar las escuelas disponibles a la vista
        ]);
        // $escuelas = Escuela::orderBy('nombre')->get(); // Obtener todas las escuelas

        // return Inertia::render('Facultad/Create', [
        //     'escuelas' => $escuelas, // Pasar la lista de escuelas a la vista
        // ]);
        // return Inertia::render('Facultad/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultadPost $request)
    {
        // Obtener los datos validados desde el request
        $validated = $request->validated();

        // Crear la facultad con el nombre
        $facultad = Facultad::create([
            'nombre' => $validated['nombre'],
        ]);

        // Asociar las escuelas a la facultad
        if (isset($validated['escuelas'])) {
            foreach ($validated['escuelas'] as $escuela_id) {
                // Verificar si la escuela ya está asociada a otra facultad
                $escuela = Escuela::find($escuela_id);
                if ($escuela && $escuela->facultad_id) {
                    // Retornar un error si la escuela ya tiene una facultad asociada
                    return redirect()->back()->withErrors([
                        'escuelas' => 'La escuela ' . $escuela->nombre . ' ya está asociada a otra facultad.',
                    ]);
                }

                // Actualizar la facultad_id de la escuela
                $escuela->update(['facultad_id' => $facultad->id]);
            }
        }

        return Redirect::route('facultad.index')->with('message', 'Facultad Creada');
    }


    /**
     * Display the specified resource.
     */
    public function show(Facultad $facultad)
    {
        //
        $facultad->load('escuelas');
        return Inertia::render('Facultad/Show', compact('facultad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facultad $facultad)
    {
        // $facultad->load('escuelas'); // Cargar escuelas asociadas
        // return Inertia::render('Facultad/Edit', [
        //     'facultad' => $facultad,
        //     'errors' => session('errors') ? session('errors')->toArray() : [],
        // ]);
        // Cargar escuelas asociadas a la facultad
        $facultad->load('escuelas');

        // Obtener las escuelas que no están asociadas a ninguna facultad
        $escuelasDisponibles = Escuela::whereNull('facultad_id')->orderBy('nombre')->get();

        return Inertia::render('Facultad/Edit', [
            'facultad' => $facultad,
            'escuelas' => $escuelasDisponibles, // Pasar las escuelas disponibles a la vista
            'errors' => session('errors') ? session('errors')->toArray() : [], // Pasar errores si existen
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultadPut $request, Facultad $facultad)
    {
        //
        // $facultad->update($request->validated());
        // // request()->session()->flash('message', 'Usuario Editado');

        // return Redirect::route('facultad.index', $facultad)->with('message', 'Facultad Editado');
        // Obtener los datos validados desde el request
        $validated = $request->validated();

        // Actualizar los datos de la facultad
        $facultad->update(['nombre' => $validated['nombre']]);

        // Actualizar las escuelas asociadas
        if (isset($validated['escuelas'])) {
            // Desasociar todas las escuelas primero
            $facultad->escuelas()->update(['facultad_id' => null]);

            foreach ($validated['escuelas'] as $escuela_id) {
                $escuela = Escuela::find($escuela_id);
                if ($escuela && $escuela->facultad_id) {
                    return redirect()->back()->withErrors([
                        'escuelas' => 'La escuela ' . $escuela->nombre . ' ya está asociada a otra facultad.',
                    ]);
                }

                // Actualizar la facultad_id de la escuela
                $escuela->update(['facultad_id' => $facultad->id]);
            }
        }

        return Redirect::route('facultad.index')->with('message', 'Facultad actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facultad $facultad)
    {
        //
        $facultad->delete();
        return Redirect::route('facultad.index')->with('message', 'Facultad Eliminado');
        // return Redirect()->back()->with('message', 'Facultad Eliminado');
    }
}
