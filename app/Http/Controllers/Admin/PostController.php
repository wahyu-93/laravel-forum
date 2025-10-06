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

    public function publishUnpublish($discussion)
    {
        $data = Discussion::find($discussion);

        $data->update([
            'published' => !$data->published,
        ]);

        $updated = $data->fresh(); // ambil ulang data dari database
        $status = $updated->published ? 'Published' : 'Unpublished';

        return back()->with('success', 'Discussion Berhasil di ' . $status);        
    }

    public function destroy($discussion)
    {
        $deleteDiscussion = Discussion::findOrFail($discussion);
        $deleteDiscussion->delete();

        return back()->with('success', 'Discussion Berhasil Dihapus');
    }
}
