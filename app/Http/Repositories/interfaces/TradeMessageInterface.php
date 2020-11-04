<?php


namespace App\Http\Repositories;

use App\Models\TradeMessage;

interface TradeMessageInterface
{
    /**
     * Fetch trade messages
     *
     * @param integer $limit
     * @param string $orderBy
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetch($limit = 10, $orderBy = 'DESC');

    /**
     * Store trade message
     *
     * @param array $data
     *
     * @return TradeMessage
     */
    public function store(array $data);
}
