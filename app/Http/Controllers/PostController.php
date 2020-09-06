<?php

namespace App\Http\Controllers;
use App\Post;
use App\Cat;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postCreate()
    {
        $cat = Cat::all();
        return view('post', compact('cat'));
    }
  
    public function postData(Request $request)
    {
        // $input = $request->all();
        $cat_id = $request->cat_id;
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->cat_id = implode(',', $cat_id);
        // Post::create($input);
        $post->save();
  
        dd('Post created successfully.');
    }

    public function show()
    {
        // $string = ["123", "34", "223"];
        // $integerIDs = array_map('intval', json_decode('["382","266","18","60"]'));;
        // dd($integerIDs);

        $post = Post::all();
        // $posts = Post::where('id', '10')->pluck('cat_id');
        $posts = Post::join('cats', 'cats.id', '=', 'posts.cat_id')
                    ->where('posts.id', '=', '10')
                    ->pluck('posts.cat_id');
        // $int_post =  array_map('intval', json_decode(Post::where('id', '10')->pluck('cat_id')));
        $pot = ["2", "3", "4"];
        $int_post = explode(',', $posts);
        // dd($int_post);
        return view('show', compact('post', 'int_post'));
    }
}
