<?php

namespace App\Http\Requests\user;

use App\Http\Response\ResponseFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LogInUserRequest extends FormRequest
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

  protected function failedValidation(Validator $validator)
  {
    $response = ResponseFactory::create(
      'Invalid credentials',
      ['The credentials entered do not match those registered in the system'],
      422
    );
    throw (new ValidationException($validator, $response))
      ->errorBag($this->errorBag)
      ->redirectTo($this->getRedirectUrl());
  }
}
