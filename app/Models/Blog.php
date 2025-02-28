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

    public function getImageURL()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        } else {
            return asset('images/news2.png');
        }
    }
    public function likes()
    {
        return $this->belongsToMany(User::class,'blog_like','blog_id')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
