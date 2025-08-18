<?php

namespace App\Services\Trades;

use App\Models\Trade;
use App\Traits\Cacheable;

class TradeService
{

    use Cacheable;


    /**
     * Create a new class instance.
     */
    public function __construct(
        protected $cacheTag = 'trades'
    )
    {
        //
    }

    public function getTrades()
    {
        return $this->rememberCache(
            'all_trades',
            function () {
                return Trade::orderBy('trade_name')->get();
            }
        );
    }


    /**
     * Get all trades as an associative array with trade IDs as keys and names as values.
     *
     * @return array
     */
    public function getTradesArray()
    {
        $trades = $this->getTrades();

        return $trades->mapWithKeys(fn ($trade) => [
            $trade->id => $trade->trade_name
        ])->toArray();
    }


    public function dropCaches()
    {
        $this->forgetCache('all_trades');
    }
}
