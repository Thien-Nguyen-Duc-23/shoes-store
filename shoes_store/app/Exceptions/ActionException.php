<?php

namespace App\Exceptions;

class ActionException extends ApiException
{
    public function __construct($action = null, $statusCode = 500)
    {
        $action = $action ? trans('exception.' . $action) : trans('exception.action');

        parent::__construct($action, $statusCode);
    }
}
