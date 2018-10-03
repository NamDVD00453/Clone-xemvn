<?php

namespace App\Http\Controllers;

use App\Post;

class IndexController extends Controller
{
    //
    public function index()
    {
        $newP = Post::where('type', 2)->orderBy('id', 'desc')->paginate(5);
        return view('index.home')->with([
            "listContent" => $newP
        ]);
    }

    public function singleImage($handle_url)
    {
        $SingleImage = Post::where('handle_url', $handle_url);
        $SingleImage->increment('seen_count', 1);
        $SingleImage1 = $SingleImage->firstOrFail();
        $thisId = $SingleImage1->id;

        $backItem = Post::where('id', $thisId-1)->first();
        $nextItem = Post::where('id', $thisId+1)->first();

        $newItems = Post::where('type', 2)->orderBy('id', 'DESC')->paginate(8);

        return view('index.image')->with(
            [
                "post" => $SingleImage1,
                "newPost" => $newItems,
                "backUrl" => $backItem,
                "nextUrl" => $nextItem
            ]
        );
    }

    public function old() {
        return view('index.home')->with([
            "listContent" => Post::where('type', 2)->paginate(5)
        ]);
    }

    public function hot() {
        return view('index.home')->with([
            "listContent" => Post::where('type', 2)->orderBy('seen_count', 'desc')->paginate(5)
        ]);
    }

    public function test(){
        return view('test')->with([
            "listContent" => Post::where('type', 2)->get()
        ]);
    }
}
