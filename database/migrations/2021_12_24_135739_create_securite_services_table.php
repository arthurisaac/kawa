<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuriteServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securite_services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date');
            $table->string('centre');
            $table->string('centreRegional');
            $table->string('chargeDeSecurite')->nullable();
            $table->string('hps_cs')->nullable();
            $table->string('hfs_cs')->nullable();
            $table->string('eop11')->nullable();
            $table->time('hps_eop11')->nullable();
            $table->time('hfs_eop11')->nullable();
            $table->string('eop12')->nullable();
            $table->time('hps_eop12')->nullable();
            $table->time('hfs_eop12')->nullable();
            $table->string('eop21')->nullable();
            $table->time('hps_eop21')->nullable();
            $table->time('hfs_eop21')->nullable();
            $table->string('eop22')->nullable();
            $table->time('hps_eop22')->nullable();
            $table->time('hfs_eop22')->nullable();
            $table->string('eop31')->nullable();
            $table->time('hps_eop31')->nullable();
            $table->time('hfs_eop31')->nullable();
            $table->string('eop32')->nullable();
            $table->time('hps_eop32')->nullable();
            $table->time('hfs_eop32')->nullable();
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
        Schema::dropIfExists('securite_services');
    }
}
