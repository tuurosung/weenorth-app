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

    public function getTradeNameById(string $tradeId): ?string
    {
        $trade = Trade::find($tradeId);
        return $trade ? $trade->trade_name : null;
    }


    public function dropCaches()
    {
        $this->forgetCache('all_trades');
    }
}
