<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Description of ExceptionTrait
 *
 * @author shyam
 */
trait ExceptionTrait {

    //put your code here
    public function exceptionApi($request, $exception) {
        if ($this->isModel($exception)) {
            return $this->modelResponse();
        }
        if ($this->isHttp($exception)) {
            return $this->httpResponse();
        }
    }

    private function isModel($e) {
        return $e instanceof ModelNotFoundException;
    }

    private function isHttp($e) {
        return $e instanceof NotFoundHttpException;
    }

    private function modelResponse() {
        return response()->json([
                    'errors' => "Product model not found"
                        ], Response::HTTP_NOT_FOUND);
    }

    private function httpResponse() {
        return response()->json([
                    'errors' => "Incorrect route"
                        ], Response::HTTP_NOT_FOUND);
    }

}
