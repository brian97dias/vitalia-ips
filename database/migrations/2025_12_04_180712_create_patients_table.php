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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->enum('id_type', ['CC', 'TI', 'RC', 'CE', 'PA', 'TE', 'PEP']);
            $table->string('id_number', 15);
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('cellphone', 15)->nullable();
            $table->string('eps', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->unique(['id_type', 'id_number'], 'uq_patients_doc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
