<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // 400 Forbidden 에러를 처리합니다.
        if ($exception instanceof HttpException && $exception->getStatusCode() === 400) {
	    return redirect('https://sangchul.kr');
        }

        // 403 Forbidden 에러를 처리합니다.
        if ($exception instanceof HttpException && $exception->getStatusCode() === 403) {
	    return redirect('https://sangchul.kr');
        }

        // 404 Not Found 에러를 처리합니다.
        if ($exception instanceof HttpException && $exception->getStatusCode() === 404) {
	    return redirect('https://sangchul.kr');
        }

        // 나머지 에러는 기본 처리를 유지합니다.
        return parent::render($request, $exception);
    }
}
