<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\SaveCategoryRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Category;

class UpdateCategoryController extends Controller
{
    public function __invoke(SaveCategoryRequest $request, Category $category)
    {

      $category->update($request->only(
        'name',
        'slug',
        'description'
      ));

      return ResponseFactory::create(
        'Category updated.',
        ['category' => $category],
      );
    }
}
