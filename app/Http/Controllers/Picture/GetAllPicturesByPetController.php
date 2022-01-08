<?php

namespace App\Http\Controllers\Picture;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;
use App\Models\Picture;
use Illuminate\Http\Request;

class GetAllPicturesByPetController extends Controller
{
    public function __invoke(Request $request, Pet $pet)
    {
      $pictures = Picture::where('pet_id', $pet->id)->get();
      return ResponseFactory::create(
        'Image retrieved successfully.',
        ['picture' => $pictures]
      );
    }
}
