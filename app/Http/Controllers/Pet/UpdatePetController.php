<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\SavePetRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;

class UpdatePetController extends Controller
{
  public function __invoke(SavePetRequest $request, Pet $pet)
  {
    $pet->update($request->only(
      'name',
      'slug',
      'description',
      'category_id',
      'status_id'
    ));

    return ResponseFactory::create(
      'Pet updated.',
      ['pet' => $pet],
    );
  }
}
