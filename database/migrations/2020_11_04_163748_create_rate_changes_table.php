<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_changes', function (Blueprint $table) {
            $table->id();
            $table->string('currency_from');
            $table->string('currency_to');
            $table->double('previous_rate', 8,6);
            $table->double('current_rate', 8,6);
            $table->double('percentage_change', 8,2);
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
        Schema::dropIfExists('rate_changes');
    }
}
