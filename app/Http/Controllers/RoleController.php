<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate();
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit', $role->id)
            ->with('info','Rol guardado con éxito');
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        //$roles = Role::get();
        $permissions = Permission::get();
        return view('roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        //actualiza role
        $role->update($request->all());

        //actualiza permisos
        $role->permissions()->sync($request->get('permissions'));
        
        return redirect()->route('roles.edit', $role->id)
            ->with('info','Rol actulizado con éxito');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('info','Eliminado con éxito');
    }
}
