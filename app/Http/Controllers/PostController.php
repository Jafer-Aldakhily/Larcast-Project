<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PostController extends Controller
{
    public function index()
    {
        return view('posts.index',[
            'posts' => Post::latest()
            ->filter(request(['search' , 'category' , 'author']))
            ->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            "post" => $post
        ]);
    }

    public function tryFun()
    {   
        $att = request()->validate([
        'title' => 'required'
        ]);
        try{
            ddd($att);
        }catch(Exception $e){
            throw new ModelNotFoundException();
        }
    }



    

        
}
