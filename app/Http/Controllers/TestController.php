<?php

namespace App\Http\Controllers;

use App\TestContent;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index()
    {
        return view('index.home')->with([
            "listContent" => TestContent::paginate(5)
        ]);
    }
}
