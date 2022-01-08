<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Requests\Status\SaveStatusRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Status;

class CreateStatusController extends Controller
{
    public function __invoke(SaveStatusRequest $request)
    {
      $status = new Status(
        [
          'name' => $request->name,
          'slug' => $request->slug,
          'description' => $request->description ?? '',
        ]
      );
      $status->save();

      return ResponseFactory::create(
        'Status created successfully',
        ['status' => $status],
        201
      );
    }
}
