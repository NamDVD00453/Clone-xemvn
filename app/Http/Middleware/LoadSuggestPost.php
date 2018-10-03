<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;
use Illuminate\Support\Facades\View;

class LoadSuggestPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $suggestHotVideo = Post::where(['status' => 1, 'type' => 1])->orderBy('seen_count', 'ASC')->paginate(3);
        $suggestNewImg = Post::where(['status' => 1, 'type' => 2])->orderBy('id', 'desc')->paginate(3);
        $suggestRandom = Post::inRandomOrder()->paginate(3);
        View::share([
            'suggestHotVideo' => $suggestHotVideo,
            'suggestNewImg' => $suggestNewImg,
            'suggestRandom' => $suggestRandom
        ]);
        return $next($request);
    }
}
