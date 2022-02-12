<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $with = ['category','author']; // for clockwork library

    // protected $fillable = ['title' , 'excerpt' , 'body']; declear all attruibutes that mass assignment

    // public function getRouteKeyName() // if you want to restriacte the show or edit and delete using the slug
    // {
    //     return 'slug';
    // }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author() // author_id should have same name or send forign key as second parameter
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comments() //  one post hasMany comments
    {
        return $this->hasMany(Comment::class);
    }


    // scopeFilter called like that Post::queryBuilder()->filter(); without full name
    
    // when is a queryBuilder function take a condition and perform the code 

    public function scopeFilter($query , array $filters)
    {

        if(isset($filters['search'])){
            $query->when($filters['search'], function($query,$search){
                $query->where(function($query) use($search){
                    $query
                    ->where('title' , 'like' , '%' . $search . '%')
                    ->orWhere('body' , 'like' , '%' . $search . '%');
                });
                
            });
        }


        if(isset($filters['category']))
        {
            $category = $filters['category'];
            $query->whereHas('category' , function($query) use ($category){
                $query->where('slug' , $category);
            });
        }

        if(isset($filters['author']))
        {
            $author = $filters['author'];
            $query->whereHas('author' , function($query) use($author){
                $query->where('username' , $author);
            });
        }
        
        
        
            
    }
    
}
