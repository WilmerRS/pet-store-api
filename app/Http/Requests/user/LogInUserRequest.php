<?php

namespace App\Http\Requests\user;

use App\Http\Requests\FormRequestApi;

class LogInUserRequest extends FormRequestApi
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'email' => 'required|email|exists:users,email',
      'password' => 'required|min:6',
    ];
  }

  public function messages()
  {
    return [
      'email.required' => 'Email is required',
      'email.email' => 'Email is invalid',
      'password.required' => 'Password is required',
      'password.min' => 'Password must be at least 6 characters',
    ];
  }
}
