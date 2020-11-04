<?php

namespace App\Http\Repositories;

use App\Models\TradeMessage;

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
    public function store(array $data)
    {
        return $this->tradeMessage->create($data);
    }
}
