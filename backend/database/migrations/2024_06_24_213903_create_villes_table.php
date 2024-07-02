<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->id('id_ville');
            $table->string('nom_ville', 50);
            $table->foreignId('province_id')->constrained('provinces', 'id_province');
            $table->unique('nom_ville');
        });
    }

    public function down()
    {
        Schema::dropIfExists('villes');
    }
};
