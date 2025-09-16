<?php

namespace App\Http\Controllers;

use App\Models\Answer;
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

    public function answerLike($id)
    {
        $answer = Answer::where('id', $id)->first();
     
        $answer->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' =>  $answer->likeCount,
            ],
        ]);
    }

    public function answerUnLike($id)
    {
        $answer = Answer::where('id', $id)->first();
     
        $answer->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' =>  $answer->likeCount,
            ],
        ]);
    }
}
