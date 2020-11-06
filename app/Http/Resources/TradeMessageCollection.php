<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TradeMessageCollection extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $records = [];
        foreach ($this->collection as $tradeMessage) {
            $records[] = [
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
        return [
            'records' => $records,
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'prev_page_url' => $this->previousPageUrl() ?  $this->previousPageUrl() . '&per_page=' . perPage() : null,
                'next_page_url' => $this->nextPageUrl() ? $this->nextPageUrl() . '&per_page=' . perPage() : null,
            ]
        ];
    }
}
