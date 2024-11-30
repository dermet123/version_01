<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role; // Asegúrate de importar el modelo Role
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener usuarios
        $users = User::orderBy("id");

        $name = "";
        if (request()->has("name")) {
            $name = request("name");
            $users = $users->where('name', 'like', '%' . $name . "%")
                ->orWhere('email', 'like', '%' . $name . "%");
        }
        $users = $users->paginate(5)->appends(request()->except("page"));

        // Obtener roles y permisos
        $roles = Role::all(); // Obtener todos los roles
        $permissions = Permission::all(); // Obtener todos los permisos

        return Inertia::render('User/Index', compact('users', 'name', 'roles', 'permissions'));
    }
    // public function index()
    // {
    //     //

    //     $users = User::orderBy("id");

    //     //request()->session()->flash('message', 'Mensaje de prueba');

    //     $name = "";
    //     if (request()->has("name")) {
    //         $name = request("name");
    //         $users = $users->where('name', 'like', '%' . $name . "%")->orWhere('email', 'like', '%' . $name . "%");
    //     }
    //     $users = $users->paginate(5)->appends(request()->except("page"));
    //     return Inertia::render('User/Index', compact('users', 'name'));
    // }
    // Método para asignar rol a usuario
    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->assignRole($request->role_id); // Asignar rol al usuario
        return response()->json(['message' => 'Rol asignado correctamente']);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserPost $request)
    {
        User::create($request->validated());

        // return Inertia::render('User/Create')->with('message', 'Usuario Creado');
        return Redirect::route('user.index')->with('message', 'Usuario Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return Inertia::render('User/Show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return Inertia::render('User/Edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPut $request, User $user)
    {
        //
        $user->update($request->validated());
        // request()->session()->flash('message', 'Usuario Editado');

        if (request()->hasFile('avatar')) {
            $user->updateProfilePhoto(request()->file("avatar"));
        }
        return Redirect::route('user.index', $user)->with('message', 'Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        // request()->session()->flash('message', 'Mensaje de prueba');
        // return Redirect()->back()->with('message', 'Usuario Eliminado');
        return Redirect::route('user.index')->with('message', 'Usuario Eliminado');
    }

    public function deleteAvatar(User $user)
    {
        $user->deleteProfilePhoto();
        return Redirect()->back()->with('message', 'Avatar Eliminado');
    }
}