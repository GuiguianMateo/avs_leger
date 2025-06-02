<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom');
            $table->string('effet_indesirable');
            $table->string('mode_administration');
            $table->enum('niveau_avertissement', ['Niveau 0', 'Niveau 1', 'Niveau 2', 'Niveau 3']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};
