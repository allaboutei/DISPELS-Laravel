<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //

    protected $fillable = ['gamertag', 'body', 'game_id', 'image', 'phone', 'role_id', 'user_id', 'email', 'name'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'player_allocate')->withPivot('joined_at')->withTimestamps();
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
