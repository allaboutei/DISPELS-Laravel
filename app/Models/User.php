<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function likes()
    {
        return $this->belongsToMany(Blog::class, 'blog_like')->withTimestamps();
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function likesBlog(Blog $blog)
    {
        return $this->likes()->where('blog_id', $blog->id)->exists();
    }
    public function player()
    {
        return $this->hasOne(Player::class);
    }
    public function getImageURL()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        } else {
            return asset('images/DISPELS.jpg');
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
}
