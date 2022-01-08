<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\LogInUserRequest;
use App\Http\Response\ResponseFactory;
use Illuminate\Support\Facades\Auth;

class LogInUserController extends Controller
{

  public function __invoke(LogInUserRequest $request)
  {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
      ResponseFactory::create(
        'Invalid credentials',
        ['The credentials entered do not match those registered in the system'],
        401
      );
    }
    $user = Auth::user();
    $token = $user->createToken('Personal Acces Token')->plainTextToken;
    $user->last_login = now();
    $user->save();
    return ResponseFactory::create(
      'Logged in successfully',
      ['token' => $token]
    );
  }
}
