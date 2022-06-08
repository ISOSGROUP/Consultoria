<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksOpportunitiesFodaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks_opportunities_foda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('risks_opportunities_id')->nullable();
            $table->unsignedBigInteger('foda_details_id')->nullable();
            $table->foreign('risks_opportunities_id')->references('id')->on('riesgos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('risks_opportunities_foda');
    }
}
