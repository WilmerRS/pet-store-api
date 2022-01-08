<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Requests\Status\SaveStatusRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Status;

class UpdateStatusController extends Controller
{
    public function __invoke(SaveStatusRequest $request, $slug)
    {
      $status = Status::where('slug', $slug)->first();
      if (empty($status) || !$status->exists()) {
        return ResponseFactory::create(
          'Status not found.',
          ['Status with [slug: ' . $slug . '] not found.'],
          404
        );
      }

      $status->update($request->only(
        'name',
        'slug',
        'description'
      ));

      return ResponseFactory::create(
        'Status updated.',
        ['status' => $status],
      );
    }
}
