<?php

namespace App\Http\Repositories;

use App\Models\RateChange;
use App\Models\TradeMessage;
use App\Http\Repositories\TradeMessageInterface;

class TradeMessageRepository implements TradeMessageInterface
{
    private $tradeMessage;

    public function __construct(TradeMessage $tradeMessage)
    {
        $this->tradeMessage = $tradeMessage;
    }

    /**
     * @inheritDoc
     */
    public function store($data)
    {
        $tradeMessage = $this->tradeMessage->create($data);
        $this->calculateRateChange($tradeMessage);
        return $tradeMessage;
    }

    /**
     * Calculates percentage rate change for currencies
     *
     * @param array $data
     *
     * @return RateChange
     */
    private function calculateRateChange($data)
    {
        $rateChange = RateChange::where('currency_from', '=', $data['currency_from'])
            ->where('currency_to', '=', $data['currency_to'])->first();

        if ($rateChange) {
            // get percentage difference between new and previous current rate
            $percent = ((100 * $data['rate']) / $rateChange->current_rate) - 100;

            $rateChange->previous_rate = $rateChange->current_rate;
            $rateChange->current_rate = $data['rate'];
            $rateChange->percentage_change = $percent;
            $rateChange->save();
        } else {
            $this->createRateChangeRecord($data);
        }
        return $rateChange;
    }

    /**
     * Create new rate change record
     *
     * @param array $data
     *
     * @return void
     */
    private function createRateChangeRecord($data)
    {
        $rateChange = new RateChange();
        $rateChange->currency_from = $data['currency_from'];
        $rateChange->currency_to = $data['currency_to'];
        $rateChange->previous_rate = $data['rate'];
        $rateChange->current_rate = $data['rate'];
        $rateChange->percentage_change = 0;
        $rateChange->save();
    }

    /**
     * @inheritDoc
     */
    public function fetch($limit = 10, $orderBy = 'DESC')
    {
        return $this->tradeMessage->orderBy('time_placed', $orderBy)->paginate($limit);
    }

    /**
     * @inheritDoc
     */
    public function fetchRatesByCurrency($currency_from, $currency_to)
    {
        return RateChange::where('currency_from', '=', $currency_from)
            ->where('currency_to', '=', $currency_to)
            ->first();
    }

    /**
     * @inheritDoc
     */
    public function fetchAllRatesChanges()
    {
        return RateChange::all();
    }
}
