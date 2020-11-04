<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TradeMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|string',
            'currency_from' => 'required|string',
            'currency_to' => 'required|string',
            'originating_country' => 'required|string',
            'amount_sell' => 'required|numeric',
            'amount_buy' => 'required|numeric',
            'rate' => 'required|numeric',
            'time_placed' => 'required|date_format:d-m-y H:i:s',
        ];
    }
}
