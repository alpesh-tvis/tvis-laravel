<?php
namespace App\Http\Controllers;

use App\Post;
use App\ReviewRating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
     public function index()
    { 

       $comment = ReviewRating::paginate(10);
       return view('admin.comment.index', compact('comment')); 
    }

    public function show(ReviewRating $comment){
       return view('admin.comment.show', compact('comment'));
    }
    public function edit(){
    }
    public function store(){
    }
    public function getComment($id)
    {   
        $post = Post::find($id);
        //$posts = Post::with('comment', 'post')->orderBy('id', 'desc')->limit(20)->get();

        return $blogcomments->with('posts', $post->blogcomments);
    }

}
