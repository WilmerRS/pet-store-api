<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Requests\Status\SaveStatusRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Status;

class UpdateStatusController extends Controller
{
    public function __invoke(SaveStatusRequest $request, Status $status)
    {
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
