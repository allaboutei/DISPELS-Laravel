<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'image',

    ];

    public function likes()
    {
        return $this->belongsToMany(User::class,'blog_like','blog_id')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
