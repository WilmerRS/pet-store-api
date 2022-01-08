<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\RegisterUserRequest;
use App\Http\Response\ResponseFactory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
  public function __invoke(RegisterUserRequest $request)
  {
    $user = new User(
      [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'username' => $request->username,
        'email' => $request->email,
        'role_id' => Role::userRoleId(),
        'password' => Hash::make($request->password),
      ]
    );
    $user->save();

    return ResponseFactory::create(
      'User created successfully',
      ['user' => $user],
      201
    );
  }
}
