<?php

namespace App\Providers;

use Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function register()
    {
        Response::macro('success', function ($data, $status = 200, $code = null) {
            $code = is_null($code) ? $status : $code;

            return Response::json([
                'success'  => true,
                'code' => $code,
                'data' => $data
            ], $status);
        });

        Response::macro('error', function ($errors, $status = 400, $code = null) {
            $errors = is_array($errors) ? $errors : ['message' => $errors];

            $code = is_null($code) ? $status : $code;

            return Response::json([
                'success'  => false,
                'code' => $code,
                'errors' => $errors
            ], $status);
        });

        \Response::macro('message', function ($message, $status = 200, $code = null) {

            $code = is_null($code) ? $status : $code;

            return response()->json([
                'success'  => $status == 200 ? true : false,
                'code' => $code,
                'message' => $message
            ], $status);            
        });   
    }

    public function boot()
    {
        //
    }
}
