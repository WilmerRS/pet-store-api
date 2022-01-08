<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\SaveCategoryRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Category;

class UpdateCategoryController extends Controller
{
    public function __invoke(SaveCategoryRequest $request, $slug)
    {
      $status = Category::where('slug', $slug)->first();
      if (empty($status) || !$status->exists()) {
        return ResponseFactory::create(
          'Category not found.',
          ['Category with [slug: ' . $slug . '] not found.'],
          404
        );
      }

      $status->update($request->only(
        'name',
        'slug',
        'description'
      ));

      return ResponseFactory::create(
        'Category updated.',
        ['category' => $status],
      );
    }
}
