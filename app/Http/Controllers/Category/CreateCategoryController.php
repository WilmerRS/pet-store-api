<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\SaveCategoryRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Category;

class CreateCategoryController extends Controller
{
    public function __invoke(SaveCategoryRequest $request)
    {
      $category = new Category(
        [
          'name' => $request->name,
          'slug' => $request->slug,
          'description' => $request->description ?? '',
        ]
      );
      $category->save();

      return ResponseFactory::create(
        'Category created successfully',
        ['category' => $category],
        201
      );
    }
}
