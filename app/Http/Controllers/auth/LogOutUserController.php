<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogOutUserController extends Controller
{

  public function __invoke(Request $request)
  {
    Auth::user()->tokens()->delete();
    return ResponseFactory::create(
      'Logged out successfully',
      ['Logged out successfully']
    );
  }
}
