<?php

namespace App\Services\Trades;

use App\Models\Trade;

class TradeService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function getTrades()
    {
        return Trade::orderBy('trade_name')->get();
    }
}
