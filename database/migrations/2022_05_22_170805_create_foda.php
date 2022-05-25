<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foda', function (Blueprint $table) {
            $table->id();
            $table->boolean('opportunities')->default(false);
            $table->boolean('threats')->default(false);
            $table->boolean('strengths')->default(false);
            $table->boolean('weaknesses')->default(false);
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
        Schema::dropIfExists('foda');
    }
}
