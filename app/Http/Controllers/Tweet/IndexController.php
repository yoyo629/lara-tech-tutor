<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //全つぶやき取得
        $tweets = Tweet::orderby('created_at', 'DESC')->get();
        return view('tweet.index')
                ->with('tweets', $tweets);
    }
}
