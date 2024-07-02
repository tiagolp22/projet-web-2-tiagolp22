<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id('id_status');
            $table->json('nom_status');
            $table->json('description')->nullable();
            $table->unique('nom_status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('status');
    }
};
