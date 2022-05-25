<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFodaStrategies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foda_strategies', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('foda_id_1')->nullable();
            $table->unsignedBigInteger('foda_id_2')->nullable();
            $table->text('description');
            $table->text('responsible');
            $table->text('status');
            $table->foreign('foda_id_1')->references('id')->on('foda')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('foda_id_2')->references('id')->on('foda')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('foda_strategies');
    }
}
