<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_messages', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 10);
            $table->string('currency_from', 5);
            $table->string('currency_to', 5);
            $table->string('originating_country', 5);
            $table->double('amount_sell', 8, 2);
            $table->double('amount_buy', 8, 2);
            $table->double('rate', 8, 6);
            $table->datetime('time_placed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_messages');
    }
}
