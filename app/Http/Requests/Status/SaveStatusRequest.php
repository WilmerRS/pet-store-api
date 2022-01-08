<?php

namespace App\Http\Requests\Status;

use App\Http\Response\ResponseFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SaveStatusRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    $method = $this->method();
    if (null !== $this->get('_method', null)) {
      $method = $this->get('_method');
    }
    $this->offsetUnset('_method');
    $rules = [
      'name' => 'required|string|max:255',
      'slug' => [
        'required',
        'string',
        'max:255'
      ]
    ];
    if ($method != 'PATCH') {
      $rules['slug'][] = 'unique:statuses,slug';
    }
    return $rules;
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
