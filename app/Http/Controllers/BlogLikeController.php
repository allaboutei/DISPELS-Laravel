<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogLikeController extends Controller
{
    //
    public function like(Blog $blog)
    {
        $liker = Auth::user();
        $liker->likes()->attach($blog);
        return redirect()->route('blogs.show',$blog->id)->with([
            'status' => 'success',
            'message' => 'You Liked the News'
        ]);
    }
    public function unlike(Blog $blog) {
        $liker = Auth::user();
        $liker->likes()->detach($blog->id);
        return redirect()->route('blogs.show',$blog->id)->with([
            'status' => 'success',
            'message' => 'You UnLiked the News'
        ]);
    }
}
