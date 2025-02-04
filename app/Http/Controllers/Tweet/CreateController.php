<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use GuzzleHttp\Promise\Create;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        //Tweetモデルをインスタンス化
        $tweet = new Tweet;
        //画面入力した投稿内容を取得
        $tweet->content = $request->tweet();
        //DBに保存
        $tweet->save();

        //元の画面へリダイレクト
        return redirect()->route('tweet.index');
    }
}
