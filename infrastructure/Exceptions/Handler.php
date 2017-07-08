<?php

namespace Infrastructure\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        return $this->renderExceptionAsJson($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }


    /**
     * Render an exception into a JSON response
     *
     * @param $request
     * @param Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */

    protected function renderExceptionAsJson($request, Exception $exception)
    {
        // Currently converts AuthorizationException to 403 HttpException
        // and ModelNotFoundException to 404 NotFoundHttpException
        $exception = $this->prepareException($exception);
        // Default response
        $response = [
            'error' => 'Sorry, something went wrong.',
        ];

        // Add debug info if app is in debug mode
        if (config('app.debug')) {
            // Add the exception class name, message and stack trace to response
            $response['exception'] = get_class($exception); // Reflection might be better here
            $response['message'] = $exception->getMessage();
            $response['trace'] = $exception->getTrace();
        }


        $status = 400;
        // Build correct status codes and status texts
        switch ($exception) {
            case $exception instanceof ValidationException:
                return $this->convertValidationExceptionToResponse($exception, $request);
            case $exception instanceof AuthenticationException:
                $status = 401;
                $response['error'] = Response::$statusTexts[$status];
                break;
            case $this->isHttpException($exception):
                $status = $exception->getStatusCode();
                $response['error'] = Response::$statusTexts[$status];
                break;
            default:
                break;
        }

        return response()->json($response, $status);
    }
}
