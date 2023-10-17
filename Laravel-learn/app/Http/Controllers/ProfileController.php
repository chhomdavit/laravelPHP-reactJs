<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::pluck('name', 'id')->toArray();
        $profile =Profile::all();
        return view('admin.profiles.index')->with(['profiles' => $profile, 'users' => $user]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'address_desc' => 'required',
            'selectedImage' => 'nullable|image'
        ]);

        $profile = Profile::where('author_id', auth()->id())->first();
        if ($profile) {
            return back()->withErrors([
                'profile' => 'You already have a profile!'
            ]);
        }

        $profile = new Profile();
        $profile->author_id = auth()->id();
        $profile->telephone = $request->input('telephone');
        $profile->address_desc = $request->input('address_desc');

        $uploadImage = $request->file('selectedImage');
        if ($uploadImage) {
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/profiles', $filename);
            $profile->image = $filename;
        }

        $profile->save();
        return redirect(route('pages.profile.index'))->with('success', 'create is succes!');
    }

    public function update(Profile $profile, Request $request)
    {
        $request->validate([
            'address_desc' => 'required',
            'telephone' => 'required',
            'selectedImage' => 'nullable|image'
        ]);

        $request->all();

        // $profile->author_id = auth()->id();
        $profile->address_desc = $request->input('address_desc');
        $profile->telephone = $request->input('telephone');

        $uploadImage = $request->file('selectedImage');
        if (!empty($uploadImage)) {
            Storage::delete('public/profiles/' . $profile->image);
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/profiles', $filename);
            $profile->image = $filename;
        }
        $profile->save();
        return redirect(route('pages.profile.index'))->with('success', 'update success!');
    }

    public function forceDestroy(Profile $profile, Request $request)
    {
        Storage::disk('public')->delete('profiles/' . $profile->image);
        $profile->forceDelete();
        return redirect(route('pages.profile.index'))->with('success', 'post permanently deleted!');
    }


}

