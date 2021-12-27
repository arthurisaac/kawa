<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localisations', function (Blueprint $table) {
            $table->id();
            $table->string('ref', 10);
            $table->string('pays', 100);
        });

        DB::table('localisations')->insert(
            [
                'ref' => 'CI',
                'pays' => "Côte d'Ivoire"
            ]);


        DB::table('localisations')->insert(
            [
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
        Schema::dropIfExists('localisations');
    }
}
