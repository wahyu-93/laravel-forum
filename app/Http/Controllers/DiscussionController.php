<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discussion\StoreRequest;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    public function index()
    {
        return view('pages.discussions.index');
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.discussions.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $discussion = $request->except(['_token']);
        $discussion['user_id'] = Auth::user()->id;

        $stripContent = strip_tags($discussion['content']);
        $isContentLong = strlen($stripContent) > 120;
        $discussion['content_preview'] = $isContentLong ? (substr($stripContent,0,120) . '...') : $stripContent;

        // dd($discussion);

        $discussion = Discussion::create($discussion);

        return redirect()->route('discussion.index')->with('success', 'Question Has Been Saved');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
