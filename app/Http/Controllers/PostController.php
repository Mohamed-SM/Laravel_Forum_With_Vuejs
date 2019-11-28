<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id){

        $post = \DB::table('posts')->where('id' ,'=',$id)->first();

        if(!$post) {
            abort(404, 'that post was not found');
        }

        return view('test',[
            'post' => $post
        ]);
    }
}
