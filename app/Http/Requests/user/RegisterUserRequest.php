<?php

namespace App\Http\Requests\user;

use App\Http\Requests\FormRequestApi;

class RegisterUserRequest extends FormRequestApi
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
//      'role_id' => 'required|integer|exists:roles,id',
    ];
  }

  public function messages()
  {
    return [
      'first_name.required' => 'First name is required',
      'last_name.required' => 'Last name is required',
      'username.required' => 'Username is required',
      'username.unique' => 'Username is already taken',
      'email.required' => 'Email is required',
      'password.required' => 'Password is required',
//      'role_id.required' => 'Role is required',
    ];
  }

}
