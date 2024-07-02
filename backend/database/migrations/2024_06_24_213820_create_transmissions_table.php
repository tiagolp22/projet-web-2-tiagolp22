<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transmissions', function (Blueprint $table) {
            $table->id('id_transmission');
            $table->json('type_transmission');
            $table->json('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transmissions');
    }
};
