<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

public function show_posts(){
    $posts = Post::all();
    return view('show_posts' ,compact('posts'));
}
}
