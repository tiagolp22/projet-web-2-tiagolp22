<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('modeles', function (Blueprint $table) {
            $table->id('id_modele');
            $table->string('nom_modele', 50);
            $table->foreignId('constructeur_id')->constrained('constructeurs', 'id_constructeur');
        });
    }

    public function down()
    {
        Schema::dropIfExists('modeles');
    }
};
