<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $discussionsCount = Discussion::count();
        $categoriesCount = Category::count();

        return view('admin.dashboard', compact('usersCount', 'discussionsCount', 'categoriesCount'));
    }
}
