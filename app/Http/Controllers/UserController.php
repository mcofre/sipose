<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use DB;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    public function create()
    {

        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create($request->all());

        for ($i = 0; $i < count($request->roles); $i++) {
            DB::table('role_user')->insert([
                'role_id' => $request->roles[$i],
                'user_id' => $user->id,
            ]);
        }

        //

        //
        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario guardado con éxito');
    }

    public function show(User $User)
    {
        return view('users.show', compact('User'));
    }

    public function edit(User $User)
    {
        $roles = Role::get();
        return view('users.edit', compact('User', 'roles'));
    }

    public function update(Request $request, User $User)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        //actualiza usuario
        $User->update($request->all());

        //actualiza usuario
        $User->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $User->id)
            ->with('info', 'Usuario actulizado con éxito');
    }

    public function destroy(User $User)
    {
        try {

            $User->delete();
        } catch (QueryException $e) {
            return back()->with('info', 'No es posible eliminar este usuario');
        }
        return back()->with('info', 'Eliminado con éxito');
    }
}
