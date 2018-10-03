<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        return view('videos.index')->with([
            "listContent" => Post::where('type', 1)->paginate(5)
        ]);
    }

    public function singleVideo($handle_url)
    {
        $VideoItems = Post::where('handle_url', $handle_url);
        $VideoItems->increment('seen_count', 1);
        $VideoItem = $VideoItems->firstOrFail();
        $thisId = $VideoItem->id;
        $newItems = Post::where('type', 1)->orderBy('id', 'DESC')->paginate(8);
        $backItem = Post::where('id', $thisId-1)->first();
        $nextItem = Post::where('id', $thisId+1)->first();
        return view('videos.single-item')->with([
            "post" => $VideoItem,
            "newPost" => $newItems,
            "backUrl" => $backItem,
            "nextUrl" => $nextItem
        ]);
    }

    public function loadNewVideoComponent() {
        $newItems = Post::where('type', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('videos.new-video-component')->with(["newPost" => $newItems]);
    }

    public function old() {
        return view('videos.index')->with([
            "listContent" => Post::where('type', 1)->orderBy('id')->paginate(5)
        ]);
    }

    public function hot() {
        return view('videos.index')->with([
            "listContent" => Post::where('type', 1)->orderBy('seen_count', 'desc')->paginate(5)
        ]);
    }
}
