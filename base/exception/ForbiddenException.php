<?php

namespace app\base\exception;

use http\Exception;

class ForbiddenException implements Exception
{
    protected $message = 'permission denied';
    protected $code = 403;

}