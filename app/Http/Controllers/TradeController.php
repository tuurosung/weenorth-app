<?php

namespace App\Http\Controllers;

use App\Http\Requests\Trades\StoreTradeRequest;
use App\Http\Requests\Trades\UpdateTradeRequest;
use App\Models\Trade;
use App\Services\Trades\TradeService;
use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;

class TradeController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new Trade(),
        private $modelName = "Trade",
        public $tradeService = new TradeService()
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.trades.index', [
            'trades' => $this->tradeService->getTrades()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTradeRequest $request)
    {
        $this->tradeService->dropCaches(); // Clear cache before storing a new trade

        return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Trade $trade)
    {
        return view('app.trades.show', [
            'trade' => $trade
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trade $trade)
    {
        return view('app.trades.modals.edit', [
            'trade' => $trade
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTradeRequest $request, Trade $trade)
    {
        $this->tradeService->dropCaches(); // Clear cache before updating a trade

        return $this->handleUpdate($request, $trade);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trade $trade)
    {
        $this->tradeService->dropCaches(); // Clear cache before deleting a trade
        
        return $this->handleDelete($trade);
    }
}
