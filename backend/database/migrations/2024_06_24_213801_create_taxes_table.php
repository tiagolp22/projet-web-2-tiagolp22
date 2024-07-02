<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->decimal('GST_HST', 5, 2);
            $table->decimal('PST', 5, 2);
            $table->foreignId('provinces_id_province')->constrained('provinces', 'id_province');
        });
    }

    public function down()
    {
        Schema::dropIfExists('taxes');
    }
};
