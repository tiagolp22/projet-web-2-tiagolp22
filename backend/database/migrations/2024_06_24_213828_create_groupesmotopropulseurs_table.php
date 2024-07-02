<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('groupesmotopropulseurs', function (Blueprint $table) {
            $table->id('id_groupe_motopropulseur');
            $table->json('type_groupe_motopropulseur');
            $table->json('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groupesmotopropulseurs');
    }
};
