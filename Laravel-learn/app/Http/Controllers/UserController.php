<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::Paginate(5);
        $profiles = Profile::pluck('image', 'id')->toArray();;
        return view('admin.users.index')->with([
            'users' => $users,
            'profiles' => $profiles,
        ]);
    }

    public function store(Request $request)
    {

        if (!$request->has('title')) {
            return back()->withErrors([
                'name' => 'name is required!',
                'password' => 'password is required!',
            ]);
        }
        $input = $request->all();
        $user = new User();
        $user->name = $input['name'];
        $user->role = $input['role'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->save();
        return redirect(route('admin.user.index'));
    }

}
