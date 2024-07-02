<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('methodespaiement', function (Blueprint $table) {
            $table->id('id_methode_paiement');
            $table->json('nom_methode_paiement');
            $table->json('description')->nullable();
            $table->unique('nom_methode_paiement');
        });
    }

    public function down()
    {
        Schema::dropIfExists('methodespaiement');
    }
};
