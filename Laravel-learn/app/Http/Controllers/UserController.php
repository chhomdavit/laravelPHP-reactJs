<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

        $requiredFields = ['name', 'role', 'email', 'password'];

    foreach ($requiredFields as $field) {
        if (!$request->has($field)) {
            return back()->withErrors([
                $field => $field . ' is required!',
            ]);
        }
    }

    $input = $request->all();
    $user = new User();
    $user->name = $input['name'];
    $user->role = $input['role'];
    $user->email = $input['email'];
    $uploadImage = $request->file('selectedImage');
        if (!empty($uploadImage)) {
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/users', $filename);
            $user->image = $filename;
        }
    $user->password = bcrypt($input['password']);
    $user->save();

    return redirect(route('admin.users.index'));
    }

    public function update(User $user, Request $request)
    {
        if (Hash::check($request->input('old_password'), $user->password)) {

            $user->name = $request->input('name');
            $user->role = $request->input('role');
            $user->email = $request->input('email');
            $uploadImage = $request->file('selectedImage');
                if (!empty($uploadImage)) {
                   Storage::delete('public/users/' . $user->image);
                    $filename = time() . '_' . $uploadImage->getClientOriginalName();
                    $uploadImage->storeAs('public/users', $filename);
                    $user->image = $filename;
                }
            $user->password = bcrypt($request->input('new_password'));
            $user->save();

            return redirect(route('admin.users.index'))->with('success', 'User updated successfully');
        } else {
            return back()->withErrors([
                'old_password' => 'The provided old password is incorrect',
            ]);
        }
    }

    public function updateRole(User $user, Request $request)
    {
            $user->role = $request->input('role');
            $user->save();
            return redirect(route('admin.users.index'))->with('success', 'User updated successfully');
    }

    public function forceDestroy(User $user, Request $request)
    {
        Storage::disk('public')->delete('users/' . $user->image);
        $user->forceDelete();
        return redirect(route('admin.users.index'))->with('success', 'post permanently deleted!');
    }

}
