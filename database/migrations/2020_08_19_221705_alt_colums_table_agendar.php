<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AltColumsTableAgendar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendar', function (Blueprint $table) {
            
            $table->string('volume_carga',255)->nullable()->change();
            $table->string('valor_nota',255)->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendar', function (Blueprint $table) {
            //
        });
    }
}
