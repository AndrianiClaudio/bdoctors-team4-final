<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Specialization extends Model
{
    protected $fillable = [
        'category', 'description'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
