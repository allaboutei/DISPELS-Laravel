<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        //
        return view('news.show');
    }


    public function store()
    {
        request()->validate([
            'title' => 'required|min:2|max:200',
            'body' => 'required |min:2|max:1000',

        ]);
        $news = new News();
        $news->title = request('title');
        $news->body = request('body');
        $news->save();
        return view('news.show');
    }
}
