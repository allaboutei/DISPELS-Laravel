<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlogController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {

        return view('blogs.blog', [
            'blogs' => Blog::orderBy('created_at', 'desc')->paginate(3)
        ]);
    }
    public function show(Blog $blog)
    {

        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $this->authorize('update',$blog);
        $editing = true;
        return view('blogs.show', compact('blog', 'editing'));
    }

    public function update(Blog $blog)
    {
        $this->authorize('update',$blog);
        $validated=request()->validate([
            'title' => 'required|min:2|max:200',
            'body' => 'required |min:2|max:1000',

        ]);
        $validated['user_id']=Auth::user()->id;
        $blog->save($validated);
        return redirect()->route('blogs.show', $blog->id)->with([
            'status' => 'success',
            'message' => 'blogs updated successfully'
        ]);
    }



    public function store()
    {
        $validated=request()->validate([
            'title' => 'required|min:2|max:200',
            'body' => 'required |min:2|max:1000',

        ]);
        $validated['user_id']=Auth::user()->id;

        Blog::create($validated);

        return redirect()->route('blogs')->with([
            'status' => 'success',
            'message' => 'blogs created successfully'
        ]);
    }
    public function destroy(Blog $blog)
    {
        $this->authorize('delete',$blog);
        $blog->delete();
        return redirect()->route('blogs')->with([
            'status' => 'success',
            'message' => 'blogs deleted successfully'
        ]);
    }
}
