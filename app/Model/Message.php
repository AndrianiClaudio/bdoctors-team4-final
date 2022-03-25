<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'email', 'content', 'user_id '
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
