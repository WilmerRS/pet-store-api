<?php

namespace App\Http\Requests\Pet;

use App\Http\Requests\FormRequestApi;

class SavePetRequest extends FormRequestApi
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
      ],
      'category_id' => 'required|integer|exists:categories,id',
      'status_id' => 'required|integer|exists:statuses,id',
    ];
    if ($method != 'PATCH') {
      $rules['slug'][] = 'unique:pets,slug';
    }
    return $rules;
  }
}
