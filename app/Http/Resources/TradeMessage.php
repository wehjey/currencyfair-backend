<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TradeMessage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \App\Models\TradeMessage $tradeMessage
     * @return array
     */
    public function toArray($tradeMessage)
    {
        return [
            'user_id' => $tradeMessage->user_id,
            'currency_from' => $tradeMessage->currency_from,
            'currency_to' => $tradeMessage->currency_to,
            'originating_country' => $tradeMessage->originating_country,
            'amount_sell' => $tradeMessage->amount_sell,
            'amount_buy' => $tradeMessage->amount_buy,
            'rate' => $tradeMessage->rate,
            'time_placed' => $tradeMessage->time_placed,
        ];
    }
}
