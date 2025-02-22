<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //

    protected $fillable = [
        'game_id',
        'name',
        'logo',
        'email',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
