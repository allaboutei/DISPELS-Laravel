<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $fillable=[
        'name',
    ];


    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
