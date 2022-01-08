<?php

namespace App\Http\Controllers\Picture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Picture\UploadPictureRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;
use App\Models\Picture;

class UploadPicturePetController extends Controller
{
    public function __invoke(UploadPictureRequest $request, $slug)
    {
      $pet = Pet::where('slug', $slug)->first();
      if (empty($pet) || !$pet->exists()) {
        return ResponseFactory::create(
          'Pet not found.',
          ['Pet with [slug: ' . $slug . '] not found.'],
          404
        );
      }

      $uploadFolder = 'pictures/pets';
      $image = $request->file('picture');
      $image_uploaded_path = $image->store($uploadFolder);

      $picture = new Picture(
        [
          'label' => $request->input('label'),
          'description' => $request->input('description'),
          'path' => $image_uploaded_path,
          'mime_type' => $image->getClientMimeType(),
          'size' => $image->getSize(),
          'pet_id' => $pet->id,
        ]
      );
      $picture->save();

      return ResponseFactory::create(
        'Image upload successfully.',
        ['picture' => $picture]
      );
    }
}
