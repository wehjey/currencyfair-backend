<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\TradeMessageInterface;
use App\Http\Requests\TradeMessageRequest;
use App\Http\Resources\TradeMessage;
use Exception;

class TradeMessagesController extends Controller
{
    /**
     * Store trade messages
     *
     * @param TradeMessageRequest $request
     * @param TradeMessageInterface $tradeMessage
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TradeMessageRequest $request, TradeMessageInterface $tradeMessage)
    {
        try {
            $tradeMessage = $tradeMessage->store($request->only(
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
            return errorResponse(500, 'An error occurred. Please try again');
        }
    }
}
