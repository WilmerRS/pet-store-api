<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Status;

class SearchStatusController extends Controller
{
    public function __invoke(Status $status)
    {
      return ResponseFactory::create(
        'Status retrieved successfully.',
        ['status' => $status]
      );
    }
}
