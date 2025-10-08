<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }

    public function activeSuspend(User $user)
    {
        $user->update([
            'actived' => !$user->actived
        ]);

        $user->fresh();

        $status = $user->actived ? 'Active kan' : 'Suspend';
        return back()->with('success', 'User Berhasil di ' . $status); 
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User Berhasil Dihapus');
    }
}
