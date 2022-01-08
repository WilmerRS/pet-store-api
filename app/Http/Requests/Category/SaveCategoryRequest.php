<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\FormRequestApi;

class SaveCategoryRequest extends FormRequestApi
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
      $rules['slug'][] = 'unique:categories,slug';
    }
    return $rules;
  }
}
