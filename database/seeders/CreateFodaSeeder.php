<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Schema;

class CreateFodaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('foda_details')->truncate();
        DB::table('foda')->truncate();
        Schema::enableForeignKeyConstraints();


        $foda[0] = ['name' => 'weaknesses'];
        $foda[1] = ['name' => 'strengths'];
        $foda[2] = ['name' => 'threats'];
        $foda[3] = ['name' => 'opportunities'];

        foreach($foda as $f){
            DB::table('foda')->insert(['name'=> $f]); 
        }
        
    }
}
