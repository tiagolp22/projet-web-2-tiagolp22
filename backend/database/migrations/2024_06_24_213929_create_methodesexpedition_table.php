<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('methodesexpedition', function (Blueprint $table) {
            $table->id('id_methode_expedition');
            $table->json('nom_methode_expedition');
            $table->decimal('prix_fixe', 10, 2);
            $table->json('description')->nullable();
            $table->unique('nom_methode_expedition');
        });
    }

    public function down()
    {
        Schema::dropIfExists('methodesexpedition');
    }
};
