<?php

namespace App\Helpers;

class ResponseFormatter
{
  protected static $response = [
    'meta' => [
      'code' => 200,
      'status' => 'success',
      'message' => null
    ],
    'data' => null
  ];

  public static function success($data = null, $message = null, $code = 200)
  {
    self::$response['meta']['message'] = $message;
    self::$response['meta']['code'] = $code;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['meta']['code']);
  }

  public static function errors($data = null, $message = null, $code = 400)
  {
    self::$response['meta']['code'] = $code;
    self::$response['meta']['status'] = 'failed';
    self::$response['meta']['message'] = $message;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['meta']['code']);
  }
}
