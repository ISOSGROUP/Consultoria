<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folder_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->boolean('view_files')->default(false);
            $table->boolean('upload_files')->default(false);
            $table->boolean('download_files')->default(false);
            $table->boolean('create_folders')->default(false);
            $table->boolean('rename_files')->default(false);
            $table->boolean('delete_files')->default(false);
            $table->foreign('folder_id')->references('id')->on('folders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('folder_permissions');
    }
}
