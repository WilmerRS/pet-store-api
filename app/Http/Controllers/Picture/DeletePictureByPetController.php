<?php

namespace App\Http\Controllers\Picture;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeletePictureByPetController extends Controller
{
    public function __invoke(Request $request, $picture_id)
    {
      $picture = Picture::where('id', $picture_id)->first();
      if (empty($picture) || !$picture->exists()) {
        return ResponseFactory::create(
          'Picture not found.',
          ['Picture with [id: ' . $picture_id . '] not found.'],
          404
        );
      }
      Storage::delete($picture->path);
      $picture->delete();
      return ResponseFactory::create(
        'Picture deleted.',
        ['Picture with [id: ' . $picture_id . '] deleted.']
      );
    }
}
