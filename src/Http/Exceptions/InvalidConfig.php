<?php

namespace JardinDeVicky\NovaFileManager\Http\Exceptions;

use Exception;

class InvalidConfig extends Exception
{
    public static function driverNotSupported(): InvalidConfig
    {
        return new static('Driver not supported. Please check your configuration');
    }
}
