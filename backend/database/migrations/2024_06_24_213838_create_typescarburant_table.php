<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('typescarburant', function (Blueprint $table) {
            $table->id('id_type_carburant');
            $table->json('type_carburant');
            $table->json('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('typescarburant');
    }
};
