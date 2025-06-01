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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('id');
            $table->decimal('posologie', 3, 1);
            $table->integer('quantite');
            $table->integer('duree');
            $table->string('detail', 250);
            $table->unsignedBigInteger('consultation_id');
            $table->unsignedBigInteger('medicament_id');
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('restrict');
            $table->foreign('medicament_id')->references('id')->on('medicaments')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
