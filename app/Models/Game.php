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
    public function positions(){
        return $this->hasMany(related: Position::class);
    }
    public function getImageURL(){
        if ($this->image) {
            return url('images/' . $this->image);
        } else {
            return asset('images/DISPELS.jpg');
        }
    }


}
