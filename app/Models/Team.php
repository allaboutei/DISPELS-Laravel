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
        'phone',
        'email',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function players()
{
    return $this->belongsToMany(Player::class, 'player_allocate')->withPivot( 'joined_at')->withTimestamps();
}


    public function getImageURL()
    {
        if ($this->logo) {
            return url('storage/' . $this->logo);
        } else {
            return asset('images/DISPELS.jpg');
        }
    }
}
