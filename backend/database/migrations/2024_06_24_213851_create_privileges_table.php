<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->id('id_privilege');
            $table->json('nom_privilege');
            $table->json('description')->nullable();
            $table->unique('nom_privilege');
        });
    }

    public function down()
    {
        Schema::dropIfExists('privileges');
    }
};
