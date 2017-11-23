<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'screen_name', 'public_key', 'apn_reg_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'api_token', 'apn_reg_id',
    ];

    /**
     * Model relationships
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Notifications
     */
    // apn
    public function routeNotificationForApn()
    {
        return $this->apn_reg_id;
    }
}
