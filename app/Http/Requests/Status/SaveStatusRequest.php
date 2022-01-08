<?php

namespace App\Http\Requests\Status;

use App\Http\Requests\FormRequestApi;

class SaveStatusRequest extends FormRequestApi
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
}
