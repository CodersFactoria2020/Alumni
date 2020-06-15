<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('haveaccess','user.index');
        $users=User::with('roles')->paginate();
        $roles=Role::all();
        return view('user.index',compact('users','roles'));
    }

    public function show(User $user)
    {
        $this->authorize('view', [$user, ['user.show','ownuser.show'] ]);
        $roles=Role::Get();
        return view ('user.show', compact('roles','user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit','ownuser.edit'] ]);
        $roles=Role::Get();
        return view ('user.edit', compact('roles', 'user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', [$user, ['user.edit','ownuser.edit'] ]);
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('user.index');;
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', [$user, ['user.destroy','ownuser.destroy'] ]);
        $user->delete();
        return redirect()->route('user.index');
    }
}
