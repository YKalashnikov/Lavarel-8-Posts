<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'body'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function likeBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }
}
