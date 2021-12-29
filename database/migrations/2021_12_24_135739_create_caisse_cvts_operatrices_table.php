<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseCvtsOperatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_cvts_operatrices', function (Blueprint $table) {
            $table->bigInteger('id', true)->index('PRIMARY kEY');
            $table->unsignedBigInteger('ctv')->nullable()->index('ctv_fk');
            $table->unsignedBigInteger('operatrice')->nullable()->index('operatrice_fk');
            $table->integer('numero')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_cvts_operatrices');
    }
}
