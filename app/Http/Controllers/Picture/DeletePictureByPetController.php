<?php

namespace App\Http\Controllers\Picture;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeletePictureByPetController extends Controller
{
    public function __invoke(Request $request, Picture $picture)
    {
      $label = $picture->label;
      Storage::delete($picture->path);
      $picture->delete();
      return ResponseFactory::create(
        'Picture deleted.',
        ['Picture with [label: ' . $label . '] deleted.']
      );
    }
}
