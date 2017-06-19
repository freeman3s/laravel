<?php

namespace App\Repositories;

use App\Post;
use App\Redis;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Posts
{
	protected $redis;
	
	public function __construct(Redis $redis)
	{
		$this->redis = $redis;
	}
	
	public function all()
	{
		return Post::latest()
			->filter(request(['month', 'year']))
			->get();
	}
}