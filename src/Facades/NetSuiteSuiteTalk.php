<?php

namespace Wjbecker\NetSuiteSuiteTalk\Facades;

use Illuminate\Support\Facades\Facade;
use Wjbecker\NetSuiteSuiteTalk\NetSuiteSuiteTalkClient;
use Wjbecker\NetSuiteSuiteTalk\Resources\CustomerResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\ExpenseReportResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\InventoryItemResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\NonInventoryPurchaseItemResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\NonInventoryResaleItemResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\NonInventorySaleItemResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\OpportunityResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\SalesOrderResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\ServicePurchaseItemResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\ServiceResaleItemResource;
use Wjbecker\NetSuiteSuiteTalk\Resources\ServiceSaleItemResource;

/**
 * @method static CustomerResource customer()
 * @method static ExpenseReportResource expenseReport()
 * @method static InventoryItemResource inventoryItem()
 * @method static NonInventoryPurchaseItemResource nonInventoryPurchaseItem()
 * @method static NonInventoryResaleItemResource nonInventoryResaleItem()
 * @method static NonInventorySaleItemResource nonInventorySaleItem()
 * @method static OpportunityResource opportunity()
 * @method static SalesOrderResource salesOrder()
 * @method static ServicePurchaseItemResource servicePurchaseItem()
 * @method static ServiceResaleItemResource serviceResaleItem()
 * @method static ServiceSaleItemResource serviceSaleItem()
 * @method static query()
 */
class NetSuiteSuiteTalk extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return NetSuiteSuiteTalkClient::class;
    }

}
