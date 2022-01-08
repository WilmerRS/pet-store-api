<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Status;

class SearchStatusController extends Controller
{
    public function __invoke($slug)
    {
      $status = Status::where('slug', $slug);
      if (empty($status) || !$status->exists()) {
        return ResponseFactory::create(
          'Status not found.',
          ['Status with [slug: '.$slug.'] not found.'],
          404
        );
      }

      return ResponseFactory::create(
        'Status retrieved successfully.',
        ['status' => $status->first()]
      );
    }
}
