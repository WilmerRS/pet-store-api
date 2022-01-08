<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class DeletePetController extends Controller
{
  public function __invoke(Pet $pet)
  {
    $pictures = Picture::where('pet_id', $pet->id)->get();
    foreach ($pictures as $picture) {
      Storage::delete($picture->path);
      $picture->delete();
    }

    $pet->delete();
    return ResponseFactory::create(
      'Pet deleted successfully.',
      ['pet' => $pet]
    );
  }
}
