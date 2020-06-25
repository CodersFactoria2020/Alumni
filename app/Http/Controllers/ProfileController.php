<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $this->authorize('haveaccess','profile.index');
        $profiles=Profile::all();
        $id = Auth::user()->id;
        $loggeduser = User::find($id);

        return view ('profile.index', compact('profiles', 'loggeduser'));
    }

    public function show(Profile $profile)
    {
        $this->authorize('haveaccess','profile.show');
        return view ('profile.show', compact(['profile']));
    }
    public function assistance(Profile $profile)
    {
        $this->authorize('haveaccess','profile.show');
        $events= Event::all();
        return view ('profile.assistance', compact(['profile', 'events']));
    }
    public function create()
    {
        $this->authorize('haveaccess','profile.create');
        return view ('profile.create');
    }
    public function store(Request $request, User $user)
    {
        $this->authorize('haveaccess','profile.create');;
        $profile=Profile::create($request->all());
        return redirect()->route('profile.index');
    }
    public function edit(Profile $profile)
    {
        $this->authorize('haveaccess','profile.edit');
        return view ('profile.edit');
    }

    public function update(Profile $profile, Request $request)
    {

        $this->authorize('haveaccess','ownprofile.edit');
        $profile->update($request->all());
        return redirect()->route('profile.index');;
    }

    public function destroy(Profile $profile)
    {
        $this->authorize('haveaccess','ownprofile.destroy');
        $profile->delete();
        return redirect()->route('profile.index');
    }
}
