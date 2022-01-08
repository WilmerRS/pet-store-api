<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Category;

class DeleteCategoryController extends Controller
{
  public function __invoke(Category $category)
  {
    $category->delete();
    return ResponseFactory::create(
      'Category deleted successfully.',
      ['category' => $category]
    );
  }
}
