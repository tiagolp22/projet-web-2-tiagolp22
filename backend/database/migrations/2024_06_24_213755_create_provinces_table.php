<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id('id_province');
            $table->string('nom_province', 50);
            $table->foreignId('pays_id')->constrained('pays', 'id_pays');
            $table->unique('nom_province');
        });
    }

    public function down()
    {
        Schema::dropIfExists('provinces');
    }
};
