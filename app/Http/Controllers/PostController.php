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
        $VideoItems = Post::where('handle_url', $handle_url);
        $VideoItems->increment('seen_count', 1);
        $VideoItem = $VideoItems->firstOrFail();
        $thisId = $VideoItem->id;
        $newItems = Post::where('type', 1)->orderBy('id', 'DESC')->paginate(8);
        $backItem = Post::where('id', $thisId-1)->firstOrFail();
        $nextItem = Post::where('id', $thisId+1)->firstOrFail();
        return view('index.item')->with([
            "post" => $VideoItem,
            "newPost" => $newItems,
            "backUrl" => $backItem->handle_url,
            "nextUrl" => $nextItem->handle_url
        ]);
    }

    public function loadNewVideoComponent() {
        $newItems = Post::where('type', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('index.newpost-component')->with(["newPost" => $newItems]);
    }

    public function loadSingleImage($handle_url)
    {
        $SingleImage = Post::where('handle_url', $handle_url);
        $SingleImage->increment('seen_count', 1);
        $SingleImage1 = $SingleImage->firstOrFail();
        $thisId = $SingleImage1->id;

        $newItems = Post::where('type', 2)->orderBy('id', 'DESC')->paginate(8);

        $backItem = Post::where('id', $thisId-1)->firstOrFail();
        $nextItem = Post::where('id', $thisId+1)->firstOrFail();

        return view('index.image')->with(
            [
                "post" => $SingleImage1,
                "newPost" => $newItems,
                "backUrl" => $backItem->handle_url,
                "nextUrl" => $nextItem->handle_url
            ]
        );
    }

//    public function loadItem($handle_url)
//    {
//
//        $CurrentItems = Post::where('handle_url', $handle_url);
//        $CurrentItems->increment('seen_count', 1);
//
//        $CurrentItem = $CurrentItems->firstOrFail();
//        $thisType = $CurrentItem->type;
//
//        $thisId = $CurrentItem->id;
//
//        $backItem = Post::where('id', $thisId-1)->firstOrFail();
//        $nextItem = Post::where('id', $thisId+1)->firstOrFail();
//
//        $newItems = Post::where('type', 1)->orderBy('id', 'DESC')->paginate(8);
//
//        return view('index.item')->with([
//            "post" => $CurrentItems,
//            "newPost" => $newItems,
//            "next" => $nextItem,
//            "back" => $backItem
//        ]);
//
//    }

}
