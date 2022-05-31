<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {

            //$table->boolean('view_folders_and_files')->default(false);
            $table->boolean('upload_files')->default(false);
            $table->boolean('download_files')->default(false);
            $table->boolean('create_folders')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {

            //$table->dropColumn('view_folders_and_files');
            $table->dropColumn('upload_files');
            $table->dropColumn('download_files');
            $table->dropColumn('create_folders');

        });
    }
}
