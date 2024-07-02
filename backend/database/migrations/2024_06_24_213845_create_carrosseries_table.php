<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carrosseries', function (Blueprint $table) {
            $table->id('id_carrosserie');
            $table->json('type_carrosserie');
            $table->json('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carrosseries');
    }
};
