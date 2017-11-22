<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

 	/**
 	 * Model relationships
 	 */
 	public function author()
 	{
 		return $this->belongsTo('App\User');
 	}

 	public function comments()
 	{
 		return $this->hasMany('App\Comment');
 	}
}
