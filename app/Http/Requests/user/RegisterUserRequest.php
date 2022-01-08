<?php

namespace App\Http\Requests\user;

use App\Http\Response\ResponseFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterUserRequest extends FormRequest
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

  protected function failedValidation(Validator $validator)
  {
    $response = ResponseFactory::create(
      'The fields entered with are correct',
      $validator->errors(),
      401
    );
    throw (new ValidationException($validator, $response))
      ->errorBag($this->errorBag)
      ->redirectTo($this->getRedirectUrl());
  }

}
