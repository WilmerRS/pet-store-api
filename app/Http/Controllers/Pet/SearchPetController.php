<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;

class SearchPetController extends Controller
{
  public function __invoke($slug)
  {
    $pet = Pet::where('slug', $slug);
    if (empty($pet) || !$pet->exists()) {
      return ResponseFactory::create(
        'Pet not found.',
        ['Pet with [slug: '.$slug.'] not found.'],
        404
      );
    }

    return ResponseFactory::create(
      'Pet retrieved successfully.',
      ['pet' => $pet->with('category', 'status')->first()]
    );
  }
}
