<?php

namespace IUTLib\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{
    /**
 * Render an exception into an HTTP response.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Exception  $exception
 * @return \Illuminate\Http\Response
 */
public function render($request, Exception $exception)
{
    if($this->isHttpException($exception))
    {
        switch ($exception->getStatusCode()) 
            {
            // not found
            case 404:
            return redirect()->route('notfound');
            break;

            // internal error
            case '500':
            return redirect()->route('notfound');
            break;

            default:
                return $this->renderHttpException($e);
            break;
        }
    }
    else
    {
            return parent::render($request, $exception);
    }
}


}
