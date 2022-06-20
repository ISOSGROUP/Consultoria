<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlOfQualityObjectivesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_of_quality_objectives', function (Blueprint $table) {
            $table->id('id');
            $table->text('quality_politics')->nullable();
            $table->text('objectives')->nullable();
            $table->text('indicator')->nullable();
            $table->text('formula')->nullable();
            $table->text('measurement_frequency')->nullable();
            $table->text('month_list')->nullable();
            $table->text('goals')->nullable();
            $table->text('status_to_date')->nullable();
            $table->text('responsible_for_providing_data')->nullable();
            $table->text('activities')->nullable();
            $table->text('resources')->nullable();
            $table->text('responsible')->nullable();
            $table->text('plazo')->nullable();
            $table->text('effectiveness_verification')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('control_of_quality_objectives');
    }
}
