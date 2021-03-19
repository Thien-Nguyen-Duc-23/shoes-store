<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable  $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable  $exception)
    {
        switch ($exception) {
            case ($exception instanceof ActionException
                || $exception instanceof NotFoundException):
                return $this->setResponse($exception->getCode(), $exception->getErrorDescription());
            default:
                break;
        }

        return parent::render($request, $exception);
    }

    
    private function setResponse(int $httpCode, $description = [])
    {
        $httpCode = $httpCode !== 0 ? $httpCode : JsonResponse::HTTP_INTERNAL_SERVER_ERROR;
        $description = $description ? $description : translate(
            'http_message.' . config('httpstatus.code.' . $httpCode)
        );

        $response = [
            'message' => [
                'status' => false,
                'code' => $httpCode,
                'description' => [$description]
            ]
        ];

        return response()->json($response, $httpCode);
    }
}
