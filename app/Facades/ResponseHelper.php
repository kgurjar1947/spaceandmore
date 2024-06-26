<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\ResponseHandler;

class ResponseHelper extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'ResponseHandler';
    }

}