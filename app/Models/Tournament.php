<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //
    protected $fillable = [
        'game_id',
        'name',
        'info',
        'price',
        'location',
        'start',
        'end',
        'image',
        'email',
    ];
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
