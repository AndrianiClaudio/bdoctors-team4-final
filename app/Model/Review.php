<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Review extends Model
{
    protected $fillable = [
        'vote', 'username', 'content', 'user_id '
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
