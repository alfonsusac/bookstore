<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Show the page to manage user accounts
    public function viewmanageaccount(Request $request)
    {
        $users = User::all();
        return view('admin.manageaccount',compact('users'));
    }

    // Delete the user
    public function deleteuser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect()->back();
    }

    // Show the page to update the selected user's role
    public function viewupdaterole(Request $request)
    {
        $user = User::find($request->id);
        $roles = Role::all();
        return view('admin.changerole',compact('user','roles'));
    }

    // Update the selected user's role
    public function updateroleuser(Request $request)
    {
        $user = User::find($request->id);
        $user->role_id = $request->role;
        $user->save();
        return redirect()->back();
    }


}
