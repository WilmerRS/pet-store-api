<?php

namespace App\Http\Controllers\Picture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Picture\UploadPictureRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadPicturePetController extends Controller
{
  public function __invoke(UploadPictureRequest $request, Pet $pet)
  {
    $uploadFolder = 'pictures/pets';
    $image = $request->file('picture');

    $image_uploaded_path = $image->store($uploadFolder);

    $treated_image = Image::make(
      Storage::get($image_uploaded_path)
    )
      ->widen(1000)
      ->limitColors(255)
      ->encode();
    Storage::put($image_uploaded_path, (string)$treated_image);

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
