<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAchatFournisseurCASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achat_fournisseur_c_a_s', function (Blueprint $table) {
            $table->foreign(['fournisseur_fk'])->references(['id'])->on('achat_fournisseurs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achat_fournisseur_c_a_s', function (Blueprint $table) {
            $table->dropForeign('achat_fournisseur_c_a_s_fournisseur_fk_foreign');
        });
    }
}
