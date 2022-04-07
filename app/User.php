<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Model\Subscription;
use App\Model\Specialization;
use App\Model\Service;
use App\Model\Message;
use App\Model\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'address',
        'slug',
        'cv',
        'photo',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class)->withPivot('expires_date');
    }
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function createSlug($title)
    {
        $slug = Str::slug($title, '-');

        $oldSlug = User::where('slug', $slug)->first();

        $counter = 1;
        while ($oldSlug) {
            $newSlug = $slug . '-' . $counter;
            $oldSlug = User::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
