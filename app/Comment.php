<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'post_id', 'parent_id'
    ];

 	/**
 	 * Model relationships
 	 */
 	public function author()
 	{
 		return $this->belongsTo('App\User', 'user_id');
 	}

 	public function parent()
 	{
 		return $this->belongsTo('App\Comment', 'parent_id');
 	}

 	public function replies()
 	{
 		return $this->hasMany('App\Comment', 'parent_id');
 	}
}
