<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('journaldebord', function (Blueprint $table) {
            $table->id('id_journal');
            $table->timestamp('date_heure')->useCurrent();
            $table->string('type_action', 50);
            $table->text('description');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs', 'id_utilisateur');
        });
    }

    public function down()
    {
        Schema::dropIfExists('journaldebord');
    }
};
