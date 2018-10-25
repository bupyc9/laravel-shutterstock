<?php

namespace App\Facades;

use App\ShutterStock\ClientInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
class ShutterStock extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ClientInterface::class;
    }
}