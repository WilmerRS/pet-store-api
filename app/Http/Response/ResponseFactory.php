<?php

namespace App\Http\Response;

class ResponseFactory
{
  public static function create($message, $data, $status = 200, $headers = ['Content-Type' => 'application/json']): \Symfony\Component\HttpFoundation\Response
  {
    return new \Symfony\Component\HttpFoundation\Response(
      json_encode([
        'code' => $status,
        'message' => $message,
        'data' => $data
      ]),
      $status,
      $headers
    );
  }
}
