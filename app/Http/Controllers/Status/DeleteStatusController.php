<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Status;

class DeleteStatusController extends Controller
{
    public function __invoke(Status $status)
    {
      $status->delete();
      return ResponseFactory::create(
        'Status deleted successfully.',
        ['status' => $status]
      );
    }
}
