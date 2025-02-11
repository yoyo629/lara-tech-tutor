<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use GuzzleHttp\Promise\Create;
use App\Services\TweetService;
use Database\Seeders\TweetSeeder;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService)
    {
        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images()
        );

        //元の画面へリダイレクト
        return redirect()->route('tweet.index');
    }
}
