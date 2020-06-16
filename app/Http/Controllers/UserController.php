<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

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

        if ($user->access == 'no')
        {
            $getRole = DB::table('role_user')->where('user_id', $user->id)->first();

            $roles = Role::find($getRole->role_id);

            return view ('user.edit', compact('roles', 'user'));
        }
        $roles=Role::Get();
        return view ('user.edit', compact('roles', 'user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', [$user, ['user.edit','ownuser.edit'] ]);
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('user.index')
            ->with('status_success','User updated successfully');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', [$user, ['user.destroy','ownuser.destroy'] ]);
        $user->delete();
        return redirect()->route('user.index')
            ->with('status_success','user successfully removed');
    }
}
