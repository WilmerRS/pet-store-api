<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Category;
use Illuminate\Http\Request;

class GetAllCategoryController extends Controller
{
  public function __invoke(Request $request)
  {
    $filters = $request->only(
      Category::filters()
    );
    $categories = Category::where('slug', 'like', '%');
    if (!empty($filters)) {
      $categories = $categories->filter($filters);
    }

    if ($request->has('paginated')) {
      $categories = $categories->paginate(abs($request->get('paginated')));
    } else {
      $categories = $categories->get();
    }

    return ResponseFactory::create(
      'Categories retrieved successfully.',
      ['categories' => $categories]
    );
  }
}
