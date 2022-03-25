<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Subscription extends Model
{
    protected $fillable = [
        'name', 'price', 'duration'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
