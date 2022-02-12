<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',['posts' => Post::paginate(10)]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',['post' => $post]);
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // I can short cut this three lines by mearge function I wrote it in comment
        $attributes = $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        /**
         * $post = new Post();
         * $post->mearge($attributes = $this->validatePost(),[
         * 'user_id' => auth()->id(),
         * 'thumbnail' => request()->file('thumbnail')->store('thumbnails')
         * ]);
         */
        Post::create($attributes);
        return redirect('/')->with('success','Added the post successfully');

    }


    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with("success","Post Updated!");
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success',"Deleted Post!");
    }


    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'slug' => ['required' , Rule::unique('posts' , 'slug')->ignore($post->id)], // ignore accept $model for instance ignore($model) => and laravel understand means ($model->id)
            'thumbnail' => $post->exists ? ['image'] : ['required','image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('posts','category_id')], 
        ]);

    }

    

}
