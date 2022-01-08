<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use App\Models\Status;
use Illuminate\Http\Request;

class GetAllStatusController extends Controller
{

  public function __invoke(Request $request)
  {
    $filters = $request->only(
      Status::filters()
    );
    $statuses = Status::where('slug', 'like', '%');
    if (!empty($filters)) {
      $statuses = $statuses->filter($filters);
    }

    if ($request->has('paginated')) {
      $statuses = $statuses->paginate(abs($request->get('paginated')));
    } else {
      $statuses = $statuses->get();
    }

    return ResponseFactory::create(
      'Statuses retrieved successfully.',
      ['statuses' => $statuses]
    );
  }
}
