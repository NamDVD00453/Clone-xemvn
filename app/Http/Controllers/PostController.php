<?php

namespace App\Http\Controllers;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('index.home')->with([
            "listContent" => Post::where('type', 2)->paginate(5)
        ]);
    }

    public function loadVideos()
    {
        return view('index.videos')->with([
            "listContent" => Post::where('type', 1)->paginate(5)
        ]);
    }

    public function loadSingleVideo($handle_url)
    {
        $SingleVideo = Post::where('handle_url', $handle_url)->firstOrFail();
        $newItems = Post::where('type', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('index.item')->with(["post" => $SingleVideo, "newPost" => $newItems]);
    }

    public function loadSingleImage($handle_url)
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
}
