<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Status;

class DeleteStatusController extends Controller
{
    public function __invoke($slug)
    {
      $status = Status::where('slug', $slug);
      if (empty($status) || !$status->exists()) {
        return ResponseFactory::create(
          'Status not found.',
          ['Status with [slug: ' . $slug . '] not found.'],
          404
        );
      }
      $status->delete();
      return ResponseFactory::create(
        'Status deleted successfully.',
        ['status' => $status]
      );
    }
}
