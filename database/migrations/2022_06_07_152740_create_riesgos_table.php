<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiesgosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riesgos', function (Blueprint $table) {
            $table->id('id');
            $table->text('risk_chance_radio')->nullable();
            $table->text('risk_chance_text')->nullable();
            $table->text('process')->nullable();
            $table->text('probability')->nullable();
            $table->text('impact')->nullable();
            $table->text('risk_level')->nullable();
            $table->text('interested_part')->nullable();
            $table->text('foda_reference')->nullable();
            $table->text('action_to_take')->nullable();
            $table->text('responsible')->nullable();
            $table->text('resources')->nullable();
            $table->date('execution_time')->nullable();
            $table->text('responsible_for_monitoring')->nullable();
            $table->text('tracking_status')->nullable();
            $table->text('is_effective')->nullable();
            $table->text('comment_on_effectiveness')->nullable();
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
        Schema::drop('riesgos');
    }
}
