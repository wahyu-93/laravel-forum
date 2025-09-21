<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Answer;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $perPage = 5;
        $column = ['*'];
        
        // supaya dalam 1 halaman ada 2 pagination
        $discussions = Discussion::where('user_id', $user->id)->paginate($perPage, $column, 'discussions_page');
        $answers = Answer::where('user_id', $user->id)->paginate($perPage, $column, 'answers_page');
        
        return view('pages.profile.index', compact('user', 'discussions', 'answers'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit($username)
    {
        $user = User::whereUsername($username)->firstOrFail();

        if($user->username !== Auth::user()->username){
            abort(500);
        }

        return view('pages.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        
        $request->validate([
            'username'  => ['required', Rule::unique('users','username')->ignore($user->id)],
            'password'  => ['confirmed'],
        ]);
        
        $updateUser = User::where('id', $id)->firstOrFail();

        if($updateUser->id !== Auth::user()->id){
            abort(500);
        };

        // Update username
        $updateUser->username = $request->username;

        // Update password hanya kalau diisi
        if ($request->filled('password')) {
            $updateUser->password = Hash::make($request->password);
        }

        // update image
        if($request->hasFile('picture')){
            // jika foto sebelumnya ada maka dihapus
            Storage::delete('public/' . $user->image);

            $image = $request->file('picture');

            $fileName = $request->username . '_' . time(). '.' .$image->getClientOriginalExtension();

            $saveImage = $image->storeAs('users', $fileName, 'public');

            $updateUser->image = $saveImage;
        };
  
        $updateUser->save();

        return redirect()->route('profile.edit', $updateUser->username);
    }
}
