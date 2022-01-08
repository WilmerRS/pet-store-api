<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Pet;
use Illuminate\Http\Request;

class GetAllPetController extends Controller
{
  public function __invoke(Request $request)
  {
    $filters = $request->only(
      Pet::filters()
    );

    $pets = Pet::with('category', 'status');
    if (!empty($filters)) {
      $pets = $pets->filter($filters)->with('category', 'status');
    }

    if ($request->has('paginated')) {
      $pets = $pets->paginate(abs($request->get('paginated')));
    } else {
      $pets = $pets->get();
    }

    return ResponseFactory::create(
      'Pets retrieved successfully.',
      ['pet' => $pets]
    );
  }
}
