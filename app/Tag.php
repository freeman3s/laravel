<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guarded = [];

    public function posts()
	{
		return $this->belongsToMany(Post::class);
	}

	public function getRouteKeyName()
	{
		return 'name';
	}

	// public function setCreatedAtAttribute($date)
	// {
	// 	$this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
	// }
}
