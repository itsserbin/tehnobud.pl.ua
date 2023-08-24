<?php

namespace App\Exceptions;

use App\Exceptions\City\CityNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;

/**
 * Class Handler
 *
 * @package App\Exceptions
 */
class Handler extends ExceptionHandler {
    
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport
        = [
            ServiceException::class,
        ];
    
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash
        = [
            'current_password',
            'password',
            'password_confirmation',
        ];
    
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        
        $this->reportable(
            static function (Throwable $e) {
                //
            }
        );
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Throwable               $e
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function render(
        $request,
        Throwable $e
    ): Response|JsonResponse|\Symfony\Component\HttpFoundation\Response {
        
        if ($e instanceof ServiceException){
            return response()
                ->json(
                    [
                        'error' => 'not found',
                    ],
                    Response::HTTP_NOT_FOUND
                );
        }
        
        if ($e instanceof LoginFailException){
            return response()->json(
                [
                    'error' => $e->getUserMessages(),
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }
        
        if ($e instanceof AbstractNotFoundException){
            return response()->json(
                [
                    'error' => $e->getUserMessages(),
                ],
                Response::HTTP_NOT_FOUND
            );
        }
        
        if ($e instanceof CityNotFoundException){
            return response()->json(
                [
                    'error' => $e->getMessage(),
                ],
                Response::HTTP_NOT_FOUND
            );
        }
        
        return parent::render($request, $e);
    }
    
}
