<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteConcernedPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerned_parties', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['internal','external'])->default('internal');
            $table->text('concerned_parties')->nullable();
            $table->text('needs')->nullable();
            $table->text('Expectations')->nullable();
            $table->text('form_of_fulfillment')->nullable();
            $table->text('related_legal_requirements')->nullable();
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
        Schema::dropIfExists('concerned_parties');

    }
}
