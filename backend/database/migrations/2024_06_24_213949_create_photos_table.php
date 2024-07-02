<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->string('photos', 255);
            $table->foreignId('voitures_id_voiture')->constrained('voitures', 'id_voiture');
            $table->integer('ordre')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('photo');
    }
};
