<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['user_id', 'post_id', 'body'];

    public function post()
    {
    	$this->belongsTo(Post::class);
    }

	public function user()
	{
		$this->belongsTo(User::class);
	}
}
