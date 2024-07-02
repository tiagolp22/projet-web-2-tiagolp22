<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('id_commande');
            $table->foreignId('id_utilisateur')->constrained('utilisateurs', 'id_utilisateur');
            $table->date('date_commande');
            $table->decimal('prix_total', 10, 2);
            $table->foreignId('status_commande_id')->constrained('status', 'id_status');
            $table->foreignId('mode_paiement_id')->constrained('methodespaiement', 'id_methode_paiement');
            $table->foreignId('mode_expedition_id')->constrained('methodesexpedition', 'id_methode_expedition');
            $table->date('date_paiement')->nullable();
            $table->date('date_expedition')->nullable();
            $table->text('commentaires')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes');
    }
};
