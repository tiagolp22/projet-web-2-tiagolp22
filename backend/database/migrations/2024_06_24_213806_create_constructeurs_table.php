<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('constructeurs', function (Blueprint $table) {
            $table->id('id_constructeur');
            $table->string('nom_constructeur', 100);
            $table->string('pays_origine', 50)->nullable();
            $table->unique('nom_constructeur');
        });
    }

    public function down()
    {
        Schema::dropIfExists('constructeurs');
    }
};
