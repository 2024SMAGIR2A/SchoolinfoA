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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('acronym');
            $table->string('email');
            $table->string('phone', 25)->nullable();
            $table->string('mobile', 25)->nullable();
            $table->string('bp')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('logo')->nullable();
            $table->string('rccm')->nullable();
            $table->string('ncc')->nullable();
            $table->string('idu')->nullable();
            $table->string('bban')->nullable();
            $table->string('iban')->nullable();
            $table->string('tax_office')->nullable(); // Pdf
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
