<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id('id_voiture');
            $table->foreignId('modele_id')->constrained('modeles', 'id_modele');
            $table->integer('annee');
            $table->date('date_arrivee');
            $table->decimal('prix_achat', 10, 2);
            $table->decimal('prix_vente', 10, 2);
            $table->json('couleur');
            $table->foreignId('type_transmission_id')->constrained('transmissions', 'id_transmission');
            $table->foreignId('groupe_motopropulseur_id')->constrained('groupesmotopropulseurs', 'id_groupe_motopropulseur');
            $table->foreignId('type_carburant_id')->constrained('typescarburant', 'id_type_carburant');
            $table->foreignId('carrosserie_id')->constrained('carrosseries', 'id_carrosserie');
            $table->integer('nombre_portes');
            $table->integer('nombre_places');
            $table->integer('kilometrage');
            $table->text('description')->nullable();
            $table->json('etat_vehicule');
            $table->foreignId('commandes_id_commande')->nullable()->constrained('commandes', 'id_commande');
        });
    }

    public function down()
    {
        Schema::dropIfExists('voitures');
    }
};
