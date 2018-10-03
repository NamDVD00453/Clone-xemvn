<?php

namespace App\Http\Controllers;

use App\Post;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('index.home')->with([
            "listContent" => Post::where('type', 2)->paginate(5)
        ]);
    }

    public function singleImage($handle_url)
    {
        $SingleImage = Post::where('handle_url', $handle_url);
        $SingleImage->increment('seen_count', 1);
        $SingleImage1 = $SingleImage->firstOrFail();
        $thisId = $SingleImage1->id;

        $backItem = Post::where('id', $thisId-1)->firstOrFail();
        $nextItem = Post::where('id', $thisId+1)->firstOrFail();

        return view('index.image')->with(
            [
                "post" => $SingleImage1,
                "backUrl" => $backItem->handle_url,
                "nextUrl" => $nextItem->handle_url
            ]
        );
    }

    public function old() {
        return view('index.home')->with([
            "listContent" => Post::where('type', 2)->orderBy('id')->paginate(5)
        ]);
    }

    public function hot() {
        return view('index.home')->with([
            "listContent" => Post::where('type', 2)->orderBy('seen_count', 'desc')->paginate(5)
        ]);
    }
}
