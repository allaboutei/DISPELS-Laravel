<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    protected $fillable = [
        'user_id',
        'game_id',
        'name',
        'image',
        'email',
        'phone',
        'gamertag',
        'role',
        'status'
    ];
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
