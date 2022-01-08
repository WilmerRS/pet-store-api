<?php

namespace App\Http\Requests\Picture;

use App\Http\Requests\FormRequestApi;

class UploadPictureRequest extends FormRequestApi
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
}
