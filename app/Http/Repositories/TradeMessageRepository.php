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

    /**
     * @inheritDoc
     */
    public function fetch($limit = 10, $orderBy = 'DESC')
    {
        return $this->tradeMessage->orderBy('time_placed', $orderBy)->paginate($limit);
    }
}
