<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discussion\StoreRequest;
use App\Http\Requests\Discussion\UpdateRequest;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $search = $request->search;

        if($request->search){
            $discussions = Discussion::with(['user', 'category', 'answers'])
                            ->where('title', 'like', '%'.$request->search.'%')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10)->withQueryString(); //withQueryString berfungsi untuk membawa nilai search ke halaman berikutnya
        }
        else {
            $discussions = Discussion::with(['user', 'category', 'answers'])->orderBy('created_at','DESC')->paginate(10);
        }
        
        return view('pages.discussions.index', compact('discussions', 'categories', 'search'));
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
        $discussion = Discussion::with(['user', 'category'])->where('slug', $id)->first();

        if(!$discussion){
            abort(404);
        };

        $isOwnedByUser = $discussion->user_id === auth()->id();

        if(!$isOwnedByUser){
            abort(404);
        };

        $categories = Category::all();
        return view('pages.discussions.edit', compact('discussion','isOwnedByUser', 'categories'));
    }

    public function update(UpdateRequest $request, $slug)
    {
        $discussionUpdate = Discussion::whereSlug($slug)->firstOrFail();

        $discussion = $request->except(['_token']);
        $discussion['user_id'] = Auth::user()->id;

        $stripContent = strip_tags($discussion['content']);
        $isContentLong = strlen($stripContent) > 120;
        $discussion['content_preview'] = $isContentLong ? (substr($stripContent,0,120) . '...') : $stripContent;

        $discussionUpdate->update($discussion);

        return redirect()->route('discussion.index')->with('success', 'Question Has Been Updated');
    }

    public function destroy(Discussion $discussion)
    {
        $discussion->delete();

        return redirect()->route('discussion.index')->with('success', 'Question Has Been Deleted');
    }

    public function byCategory($slug)
    {
        $categories = Category::all();
        $discussions = Discussion::with(['user', 'category'])
                        ->whereHas('category', function($query) use ($slug){
                            $query->where('slug', $slug);
                        })
                        ->orderBy('created_at','DESC')
                        ->paginate(10)
                        ->withQueryString();

        $categorySelect = Category::where('slug', $slug)->first();

        return view('pages.discussions.index', compact('discussions', 'categories', 'categorySelect'));
    }

    public function show($slug)
    {
        $discussion = Discussion::with(['user', 'category'])->where('slug', $slug)->first();

        $answers = Answer::with(['user','discussion'])->where('discussion_id', $discussion->id)->orderBy('created_at','DESC')->paginate(5);

        if(!$discussion){
            abort(404);
        };

        $categories = Category::all();

        // mengecek apakah discussion yang dipilih ini sudah disukai oleh user aktif ini atau belum
        $likeImage = url('assets/images/like.png');
        $likedImage = url('assets/images/liked.png');
        
        return view('pages.discussions.show', compact('discussion', 'categories', 'likeImage', 'likedImage', 'answers'));
    }
}
