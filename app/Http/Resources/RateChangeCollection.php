<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RateChangeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [];
        foreach ($this->collection as $rateChange) {
            $data[] = [
                'currency_from' => $rateChange->currency_from,
                'currency_to' => $rateChange->currency_to,
                'previous_rate' => $rateChange->previous_rate,
                'current_rate' => $rateChange->current_rate,
                'percentage_change' => $rateChange->percentage_change,
            ];
        }
        return $data;
    }
}
