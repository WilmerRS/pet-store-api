<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\SavePetRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;

class CreatePetController extends Controller
{
    public function __invoke(SavePetRequest $request)
    {
      $pet = new Pet(
        [
          'name' => $request->name,
          'slug' => $request->slug,
          'description' => $request->description ?? '',
          'category_id' => $request->category_id,
          'status_id' => $request->status_id,
        ]
      );
      $pet->save();

      return ResponseFactory::create(
        'Pet created successfully',
        ['pet' => $pet->with('category', 'status')->find($pet->id)],
        201
      );
    }
}
