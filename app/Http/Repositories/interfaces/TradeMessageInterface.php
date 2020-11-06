<?php


namespace App\Http\Repositories\Interfaces;

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
     * @return \App\Models\TradeMessage
     */
    public function store($data);

    /**
     * Fetch rate changes by currency
     *
     * @param string $currency_from
     * @param string $currency_to
     * 
     * @return \App\Models\RateChange
     */
    public function fetchRatesByCurrency($currency_from, $currency_to);

    /**
     * Fetch all rate changes
     * 
     * @return \App\Models\RateChange
     */
    public function fetchAllRatesChanges();
}
