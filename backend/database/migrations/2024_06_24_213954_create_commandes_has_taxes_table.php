<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commandes_has_taxes', function (Blueprint $table) {
            $table->foreignId('commandes_id_commande')->constrained('commandes', 'id_commande');
            $table->foreignId('taxes_id')->constrained('taxes', 'id');
            $table->primary(['commandes_id_commande', 'taxes_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes_has_taxes');
    }
};
