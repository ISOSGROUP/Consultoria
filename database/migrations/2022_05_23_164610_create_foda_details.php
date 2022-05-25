<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFodaDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foda_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foda_id')->nullable();
            //$table->unsignedBigInteger('foda_strategies_id')->nullable();

            $table->text('description');
            $table->foreign('foda_id')->references('id')->on('foda')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('foda_strategies_id')->references('id')->on('foda')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('foda_details');
    }
}
