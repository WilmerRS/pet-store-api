<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Category;

class SearchCategoryController extends Controller
{
    public function __invoke(Category $category)
    {
      return ResponseFactory::create(
        'Category retrieved successfully.',
        ['category' => $category]
      );
    }
}
