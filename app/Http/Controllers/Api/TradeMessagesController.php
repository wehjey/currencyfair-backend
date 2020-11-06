<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\interfaces\TradeMessageInterface;
use App\Http\Requests\TradeMessageRequest;
use App\Http\Resources\RateChange;
use App\Http\Resources\RateChangeCollection;
use App\Http\Resources\TradeMessage;
use App\Http\Resources\TradeMessageCollection;
use Exception;

class TradeMessagesController extends Controller
{
    private $tradeMessage;

    public function __construct(TradeMessageInterface $tradeMessage)
    {
        $this->tradeMessage = $tradeMessage;
    }

    /**
     * Returns paginated result of trade messages
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return okResponse(200, 'Successful', new TradeMessageCollection($this->tradeMessage->fetch(perPage())));
        } catch (Exception $e) {
            return errorResponse(500, $e->getMessage());
        }
    }

    /**
     * Store trade messages
     *
     * @param TradeMessageRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TradeMessageRequest $request)
    {
        try {
            $tradeMessage = $this->tradeMessage->store($request->only(
                [
                    'user_id',
                    'currency_from',
                    'currency_to',
                    'originating_country',
                    'amount_sell',
                    'amount_buy',
                    'rate',
                    'time_placed',
                ]
            ));

            return okResponse(201, 'Successful', new TradeMessage($tradeMessage));
        } catch (Exception $e) {
            return errorResponse(500, $e->getMessage());
        }
    }

    /**
     * Returns rates by currency from/to
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchRatesByCurrency()
    {
        if (request()->has(['currencyFrom', 'currencyTo'])) {
            return okResponse(
                200,
                'Successful',
                new RateChange($this->tradeMessage->fetchRatesByCurrency(request('currencyFrom'), request('currencyTo')))
            );
        } else {
            return errorResponse(400, 'No currency from and currency to');
        }
    }

    /**
     * Returns all rate changes
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchAllRatesChanges()
    {
        return okResponse(
            200,
            'Successful',
            new RateChangeCollection($this->tradeMessage->fetchAllRatesChanges())
        );
    }
}
