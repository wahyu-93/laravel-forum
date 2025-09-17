<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\StoreRequest;
use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function edit($id)
    {
        $descryptId = Crypt::decryptString($id);

        $answer = Answer::where('id', $descryptId)->firstOrFail();

        return view('pages.answers.edit',compact('answer'));

    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'answer'    => 'required'
        ]);


        $answer->update([
            'answer' => $request->answer
        ]);


        return redirect()->route('discussion.show', $answer->discussion->slug)->with('success', 'Answer Has Been Updated');

    }

    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('discussion.show', $answer->discussion->slug)->with('success', 'Answer Has Been Deleted');
    }
}
