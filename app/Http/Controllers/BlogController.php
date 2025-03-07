<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {

        return view('blogs.blog', [
            'blogs' => Blog::latest()->paginate(3)
        ]);
    }
    public function show(Blog $blog)
    {

        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {

        $editing = true;
        return view('blogs.show', compact('blog', 'editing'));
    }

    public function update(Blog $blog)
    {

        $validated = request()->validate([
            'title' => 'required|min:2|max:200',
            'body' => 'required |min:50|max:4000',
            'image' => 'nullable|image'
        ]);

        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('blog', 'public');
            $validated['image'] = $imagePath;

            // Optional: Delete old image if needed
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
        }

        $validated['user_id'] = Auth::user()->id;
        $blog->update($validated);
        return redirect()->route('blogs.show', $blog->id)->with([
            'status' => 'success',
            'message' => 'blogs updated successfully'
        ]);
    }



    public function store(Blog $blog)
    {
        $validated = request()->validate([
            'title' => 'required|min:2|max:200',
            'body' => 'required |min:50|max:4000',
            'image' => 'nullable|image'
        ]);

        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('blog', 'public');
            $validated['image'] = $imagePath;
        }


        $validated['user_id'] = Auth::user()->id;

        Blog::create($validated);

        return redirect()->route('blogs')->with([
            'status' => 'success',
            'message' => 'blogs created successfully'
        ]);
    }
    public function destroy(Blog $blog)
    {
       
        $blog->delete();
        return redirect()->route('blogs')->with([
            'status' => 'success',
            'message' => 'blogs deleted successfully'
        ]);
    }
}
