<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAchatBonComandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achat_bon_comandes', function (Blueprint $table) {
            $table->foreign(['fournisseur_fk'])->references(['id'])->on('achat_fournisseurs')->onDelete('CASCADE');
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achat_bon_comandes', function (Blueprint $table) {
            $table->dropForeign('achat_bon_comandes_fournisseur_fk_foreign');
        });
    }
}
