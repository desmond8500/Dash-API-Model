<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Reponse API
     *
     * @param boolean $success Description
     * @param string $message Message
     * @param array $data Donnnnées à retourner
     * @return type
     * @throws conditon
     **/
    public static function response($success, $message, $data = null, $code = null)
    {
        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];

        if (!$code) {
            if ($success) {
                $code = 200;
            } else {
                $code = 400;
            }
        }

        return response()->json($response, $code);
    }

    public static function fullResponse($condition, $success_message, $error_message, $data = null)
    {
        if ($condition) {
            $response = [
                'success' => true,
                'message' => $success_message,
                'data'    => $data
            ];
            $code = 200;
        } else {
            $response = [
                'success' => false,
                'message' => $error_message,
            ];
            $code = 404;
        }

        return response()->json($response, $code);
    }
}
