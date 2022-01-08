<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Category;

class SearchCategoryController extends Controller
{
    public function __invoke($slug)
    {
      $status = Category::where('slug', $slug);
      if (empty($status) || !$status->exists()) {
        return ResponseFactory::create(
          'Category not found.',
          ['Category with [slug: '.$slug.'] not found.'],
          404
        );
      }

      return ResponseFactory::create(
        'Category retrieved successfully.',
        ['category' => $status->first()]
      );
    }
}
