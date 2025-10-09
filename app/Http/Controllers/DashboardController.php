<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $usersCount = User::count();
        $discussionsCount = Discussion::count();
        $AnswersCount = Answer::count();

        // postingan terbaru
        $discussions = Discussion::with(['category','user'])->latest()->published()->take(3)->get();


        return view('home', compact('usersCount', 'discussionsCount', 'AnswersCount', 'discussions'));
    }
}
