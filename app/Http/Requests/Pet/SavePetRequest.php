<?php

namespace App\Http\Requests\Pet;

use App\Http\Response\ResponseFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SavePetRequest extends FormRequest
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
      ],
      'category_id' => 'required|integer|exists:categories,id',
      'status_id' => 'required|integer|exists:statuses,id',
    ];
    if ($method != 'PATCH') {
      $rules['slug'][] = 'unique:pets,slug';
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
