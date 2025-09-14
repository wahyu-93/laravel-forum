<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\StoreRequest;
use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(StoreRequest $request, Discussion $discussion)
    {
        $answer = $request->except(['_token']);

        $answer['user_id'] = auth()->id();
        $answer['discussion_id'] = $discussion->id;
        
        $anserStore = Answer::create($answer);

        if($anserStore){
            return redirect()->route('discussion.show',$discussion->slug)->with('success', 'Your answer has been successfully added');
        }

        abort(500);
    }
}
