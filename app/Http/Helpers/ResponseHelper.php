<?php

/**
 * Response helper file
 */

/**
 * Returns an error json response
 *
 * @param $status
 * @param $message
 * @return \Illuminate\Http\JsonResponse
 */
function errorResponse($status, $message)
{
    $data = [
        'status' => $status,
        'success' => false,
        'message' => $message,
    ];
    return response()->json($data, $status);
}

/**
 * Returns ok json response
 *
 * @param $status
 * @param $message
 * @param $data
 * @return \Illuminate\Http\JsonResponse
 */
function okResponse($status, $message, $data)
{
    $data = [
        'status' => $status,
        'success' => true,
        'message' => $message,
        'data' => $data
    ];
    return response()->json($data, $status);
}
