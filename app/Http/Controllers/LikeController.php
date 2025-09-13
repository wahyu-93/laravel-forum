<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function discussionLike($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
     
        $discussion->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ],
        ]);
    }

    public function discussionUnLike($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();

        $discussion->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ],
        ]);
    }
}
