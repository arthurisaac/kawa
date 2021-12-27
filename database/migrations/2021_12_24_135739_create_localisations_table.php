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
            $table->integer('id', true);
            $table->string('ref', 10)->default('0');
            $table->string('pays', 100)->default('0');
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
