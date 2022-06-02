<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFodaStrategiesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foda_strategies_details', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('foda_strategies_id')->nullable();
            $table->unsignedBigInteger('foda_details_id')->nullable();
            $table->foreign('foda_strategies_id')->references('id')->on('foda_strategies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('foda_details_id')->references('id')->on('foda_details')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('foda_strategies_details');
    }
}
