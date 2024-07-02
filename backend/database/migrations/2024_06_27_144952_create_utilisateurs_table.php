<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('id_utilisateur');
            $table->string('prenom', 50);
            $table->string('nom', 50);
            $table->date('date_naissance');
            $table->string('adresse', 255);
            $table->string('code_postal', 10);
            $table->string('numero_telephone', 20);
            $table->string('numero_portable', 20)->nullable();
            $table->string('courriel', 100)->unique();
            $table->foreignId('privileges_id')->constrained('privileges', 'id_privilege');
            $table->string('nom_utilisateur', 50)->unique();
            $table->string('mot_de_passe', 255);
            $table->timestamp('derniere_connexion')->nullable()->useCurrent();
            $table->foreignId('villes_id_ville')->constrained('villes', 'id_ville');
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
};
