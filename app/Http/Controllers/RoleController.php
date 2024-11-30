<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // Mostrar todos los roles y permisos
    public function index()
    {
        return Inertia::render('RolesPermissions/ManageRoles', [
            'roles' => Role::with('permissions')->get(),
            'permissions' => Permission::all(),
            'users' => User::with('roles')->get()
        ]);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'array'

        ]);

        $role = Role::create(['name' => $request->name]);
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
    }

    // Mostrar el formulario para editar un rol
    public function edit(Role $role)
    {
        return Inertia::render('RolesPermissions/EditRole', [
            'role' => $role->load('permissions'),
            'permissions' => Permission::all(),
        ]);
    }

    // Actualizar un rol existente
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'array',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente');
    }

    // Eliminar un rol
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente');
    }

    // Métodos para gestión de permisos
    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name'
        ]);

        Permission::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Permiso creado correctamente');
    }

    public function updatePermission(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $permission->id
        ]);

        $permission->update(['name' => $request->name]);
        return redirect()->back()->with('success', 'Permiso actualizado correctamente');
    }

    public function destroyPermission(Permission $permission)
    {
        $permission->delete();
        return redirect()->back()->with('success', 'Permiso eliminado correctamente');
    }

    // Métodos para asignación de roles a usuarios
    public function assignRoles(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id'
        ]);

        $user->syncRoles($request->roles);
        return response()->json(['message' => 'Roles asignados correctamente']);
    }

    public function getUserRoles(User $user)
    {
        return response()->json([
            'roles' => $user->roles()->pluck('id'),
        ]);
    }
}
