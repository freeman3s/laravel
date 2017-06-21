<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Post extends Model
{
    protected $guarded = [];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    public function addComment($body)
    {
    	Comment::create([
			'body' => $body,
			'post_id' => $this->id,
			'user_id' => auth()->id()
		]);
    }

    public function scopeFilter($query, $filters)
    {
		if ($month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month);
		}

		if ($year = $filters['year']) {
			$query->whereYear('created_at', $year);
		}
    }

    public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('min(created_at) desc')
			->get()
			->toArray();
	}

	public function scopeMostCommented()
	{
		return	DB::table('posts')
	        ->join('comments', 'posts.id', '=', 'comments.post_id')
	        ->select('posts.id as id', 'posts.slug as slug', 'posts.title as title', DB::raw('count(comments.id) as comments'))
	        ->groupBy('id', 'title', 'slug')
	        ->orderByRaw('comments desc')
	        ->limit(10)
	        ->get();
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}
}
