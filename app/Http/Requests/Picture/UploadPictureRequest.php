<?php

namespace App\Http\Requests\Picture;

use App\Http\Response\ResponseFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UploadPictureRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'label' => 'required|string|max:255',
      'description' => 'string',
      'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    $response = ResponseFactory::create(
      'The fields entered with are correct',
      $validator->errors(),
      422
    );
    throw (new ValidationException($validator, $response))
      ->errorBag($this->errorBag)
      ->redirectTo($this->getRedirectUrl());
  }
}
