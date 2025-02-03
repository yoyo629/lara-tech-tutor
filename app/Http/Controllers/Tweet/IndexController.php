<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return view('tweet.index', ['name' => 'laravel']);

        //Facade呼び出し
        return View::make('tweet.index',['name' => 'laravel']);

        //with関数
        // return view('tweet.index')
        //         ->with('name', 'laravel');
    }
}
