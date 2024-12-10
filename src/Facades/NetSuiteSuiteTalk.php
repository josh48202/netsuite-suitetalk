<?php

namespace Wjbecker\NetSuiteSuiteTalk\Facades;

use Illuminate\Support\Facades\Facade;
use Wjbecker\NetSuiteSuiteTalk\NetSuiteSuiteTalkClient;
use Wjbecker\NetSuiteSuiteTalk\Resources\CustomerResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\SalesOrderResource;

/**
 * @method static CustomerResource customer()
 * @method static SalesOrderResource salesOrder()
 * @method static query()
 */
class NetSuiteSuiteTalk extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return NetSuiteSuiteTalkClient::class;
    }

}
