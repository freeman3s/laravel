<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role_id' => 'required|integer',
            'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
    	$user = User::create([
    		'role_id' => request('role_id'),
			'name' => request('name'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
		]);
    }

    public function update($user)
    {
    	

    	$this->validate(request(), [
			'name' => 'required|unique:tags'
		]);

    	dd($user);
    	$tag = Tag::find($tag->id);
		$user->name = request('name');
		$tag->save();
    }
}
