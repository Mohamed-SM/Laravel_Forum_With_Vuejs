<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id){
        return view('test',[
            'post' => Post::findOrFail($id)
        ]);
    }
}
