<?php

namespace App\Http\Requests;

use App\Http\Response\ResponseFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class FormRequestApi extends FormRequest
{
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
