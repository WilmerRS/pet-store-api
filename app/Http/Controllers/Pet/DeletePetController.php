<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;

class DeletePetController extends Controller
{
  public function __invoke($slug)
  {
    $pet = Pet::where('slug', $slug);
    if (empty($pet) || !$pet->exists()) {
      return ResponseFactory::create(
        'Pet not found.',
        ['Pet with [slug: ' . $slug . '] not found.'],
        404
      );
    }
    $pet->delete();
    return ResponseFactory::create(
      'Pet deleted successfully.',
      ['pet' => $pet]
    );
  }
}
