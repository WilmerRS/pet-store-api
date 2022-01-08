<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;

class SearchPetController extends Controller
{
  public function __invoke(Pet $pet)
  {
    return ResponseFactory::create(
      'Pet retrieved successfully.',
      ['pet' => $pet->with('category', 'status')->findOrFail($pet->id)]
    );
  }
}
