<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RateChange extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return array
     */
    public function toArray($request)
    {
        return [
            'currency_from' => $this->currency_from,
            'currency_to' => $this->currency_to,
            'previous_rate' => $this->previous_rate,
            'current_rate' => $this->current_rate,
            'percentage_change' => $this->percentage_change,
        ];

    }
}
