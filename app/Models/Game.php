<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    protected $fillable = [
        'name',
        'image',
    ];
    public function players(){
        return $this->hasMany(Player::class);
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function tournaments(){
        return $this->hasMany(Tournament::class);
    }
}
