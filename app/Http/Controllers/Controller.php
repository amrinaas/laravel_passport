<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];


        return response()->json($response, 200);
    }

    // public function sendResponse($msg, $data, $code = 200, $version = '1.0')
    // public function sendResponse($msg, $data)
    // {
    //     return response()->json([
    //         'success' => true,
    //         'message' => $msg,
    //         'data' => $data,
    //         'code' => $code,
    //         'version' => $version
    //     ], $code);

    //     $response = [
    //         'success' => true,
    //         'message' => $msg,
    //         'data' => $data,
    //         'code' => $code,
    //         'version' => $version
    //     ];

    //     return response()->json($response, 200);
    // }


    // /**
    //  * return error response.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

}
