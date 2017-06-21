<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Repositories\Users;
use App\Http\Requests\UserForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	public function index(Users $users)
	{
		$users = $users->all();

		return view('admin.users.index', compact('users'));
	}

	public function show(User $user)
	{
		return view('admin.users.show', compact('user'));
	}

	public function create()
	{
		return view('admin.users.create');
	}

	public function store(UserForm $form)
	{
		$form->persist();

		session()->flash('message', 'User has now been added.');

		return redirect('/admin/users');
	}

	public function edit(User $user)
	{
		return view('admin.users.edit', compact('user'));
	}

	public function update(User $user)
	{
		$this->validate(request(), [
			'role_id' => 'required|integer',
            'name' => 'required',
			'password' => 'required|confirmed'
		]);
		if ($user->email !== request('email')) {
    		$this->validate(request(), [
				'email' => 'required|unique:users'
			]);
    	}
    	if ($user->password !== request('password')) {
			$user->password = bcrypt(request('password'));
    	}

		$user->role_id = request('role_id');
		$user->name = request('name');
		$user->email = request('email');
		$user->updated_at = time();
		$user->save();

		session()->flash('message', 'User has now been updated.');

		return redirect('/admin/users');
	}

	public function delete(User $user)
	{
		$user->forceDelete();

		session()->flash('message', 'User has now been deleted.');

		return redirect('/admin/users');
	}
}
