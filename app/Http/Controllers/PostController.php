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
        $post->cat_id =  ','. implode(',', $cat_id);
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
        $posts = Post::join('cats', 'posts.cat_id', '=', 'cats.id')
                    ->where('posts.id', '=', '3')
                    ->pluck('posts.cat_id', 'cats.name');

        $postss = Post::where('posts.id', '=', '3')
                    ->get();
        // $int_post =  array_map('intval', json_decode(Post::where('id', '10')->pluck('cat_id')));
        $pot = ["2", "3", "4"];
//         $integerIDs = json_decode('[' . $posts . ']', true);
//  dd($integerIDs);

        $explode_id_ = array_map('intval', explode(',', $postss));
        $explode_id = json_decode($posts, true);

        // $x = array_slice(explode(',', $posts), 0, 3);
        // dd($x);

        // $result_array = [];
        //     $strings_array = explode(',', $posts);

        //     foreach ($strings_array as $each_number) {
        //         $result_array[] = (int) $each_number;
        //     }

        //     dd($result_array);

        $stringArray = ["1", "2", "3", "4"];
        $string_ex = explode(',', $posts);

        $intArray = array_map(
            function($value) { return (int)$value; },
            $string_ex
        );

        // $ids = explode(',', $posts);
        //     foreach ($ids as $index => $value) {
        //         $ids[$index] = (int)$value;
        //     }
            

        // dd($intArray);

        // $int_post = explode(',', $posts);
        // // $int = (int)$pot;
        // // dd($int);
        // dd($int_post);
        return view('show', compact('post', 'explode_id_', 'intArray'));
    }
}
