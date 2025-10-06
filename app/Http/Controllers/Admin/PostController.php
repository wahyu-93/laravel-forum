<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Discussion::with(['user', 'category', 'answers'])->latest()->get();

        return view('admin.post.index', compact('posts'));
    }
}
