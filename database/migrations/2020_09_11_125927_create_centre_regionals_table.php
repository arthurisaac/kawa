<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentreRegionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centre_regionals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('centre_regional');
            $table->integer('id_centre');
        });
\Illuminate\Support\Facades\DB::table('centre_regionals')->insert( array(
    ['centre_regional' => 'Abdijan Nord', 'id_centre' => 1],
    ['centre_regional' => 'Abdijan Sud', 'id_centre' => 1],
    ['centre_regional' => 'Abengourou', 'id_centre' => 1],
    ['centre_regional' => 'Bouaké', 'id_centre' => 2],
    ['centre_regional' => 'Yamoussokro', 'id_centre' => 2],
    ['centre_regional' => 'Korogo', 'id_centre' => 2],
    ['centre_regional' => 'Man', 'id_centre' => 3],
    ['centre_regional' => 'Daloa', 'id_centre' => 3],
    ['centre_regional' => 'San Pedro', 'id_centre' => 3],
));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centre_regionals');
    }
}
