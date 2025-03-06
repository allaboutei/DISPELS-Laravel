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
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function getImageURL()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        } else {
            return asset('images/DISPELS.jpg');
        }
    }
}
