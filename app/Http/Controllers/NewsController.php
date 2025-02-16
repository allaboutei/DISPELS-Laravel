<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {

        return view('news.news', [
            'news' => News::orderBy('created_at', 'desc')->paginate(6)
        ]);
    }
    public function show(News $new)
    {

        return view('news.show', compact('new'));
    }

    public function edit(News $new)
    {
        $editing = true;
        return view('news.show', compact('new', 'editing'));
    }

    public function update(News $new)
    {
        request()->validate([
            'title' => 'required|min:2|max:200',
            'body' => 'required |min:2|max:1000',

        ]);
        $news = News::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);
        return redirect()->route('news.show', $new->id)->with([
            'status' => 'success',
            'message' => 'News updated successfully'
        ]);
    }



    public function store()
    {
        request()->validate([
            'title' => 'required|min:2|max:200',
            'body' => 'required |min:2|max:1000',

        ]);
        $news = News::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect()->route('news')->with([
            'status' => 'success',
            'message' => 'News created successfully'
        ]);
    }
    public function destroy(News $new)
    {
        $new->delete();
        return redirect()->route('news')->with([
            'status' => 'success',
            'message' => 'News deleted successfully'
        ]);
    }
}
