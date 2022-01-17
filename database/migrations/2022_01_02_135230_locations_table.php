<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function(Blueprint $table) {
            $table->id();
            $table->string('ref', 10);
            $table->string('pays');
        });

        DB::table('locations')->insert([
            'ref' => 'CI',
            'pays' => "Côte d'Ivoire"
        ]);


        DB::table('locations')->insert([
            'ref' => 'BF',
            'pays' => "Burkina Faso"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
