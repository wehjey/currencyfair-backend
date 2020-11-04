<?php


namespace App\Http\Repositories;

use App\Models\TradeMessage;

interface TradeMessageInterface
{

    /**
     * Store trade message
     *
     * @param array $data
     *
     * @return TradeMessage
     */
    public function store(array $data);
}
