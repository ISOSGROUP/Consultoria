<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permission_id')->nullable();
            $table->boolean('upload_files')->default(false);
            $table->boolean('download_files')->default(false);
            $table->boolean('create_folders')->default(false);
            $table->boolean('rename_files')->default(false);
            $table->boolean('delete_files')->default(false);
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('permisos_details');
    }
}
