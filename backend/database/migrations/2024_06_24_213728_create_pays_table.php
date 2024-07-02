<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id('id_pays');
            $table->json('nom_pays');
            $table->unique('nom_pays');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pays');
    }
};
