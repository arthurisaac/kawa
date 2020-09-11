<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('centre');
        });

        \Illuminate\Support\Facades\DB::table('centres')->insert( array(
            ['centre' => 'Abidjan', 'id' => 1],
            ['centre' => 'Bouaké', 'id' => 2],
            ['centre' => 'Daloa', 'id' => 3],
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centres');
    }
}
