<?php

namespace App\Repositories;

use App\User;

class Users
{
	public function all()
	{
		return User::latest()
			->paginate(10);
	}
}