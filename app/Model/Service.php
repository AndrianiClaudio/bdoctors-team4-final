<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Service extends Model
{
    protected $fillable = [
        'type', 'description', 'user_id', 'specialization_id '
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function specializations()
    {
        return $this->belongsTo(Specialization::class);
    }
}
