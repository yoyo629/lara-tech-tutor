<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\TweetService;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        //全つぶやき取得
        $tweets = $tweetService->getTweets();
        return view('tweet.index')
                ->with('tweets', $tweets);
    }
}
