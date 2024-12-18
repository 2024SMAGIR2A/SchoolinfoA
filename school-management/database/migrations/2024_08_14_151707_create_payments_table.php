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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_number')->nullable();
            $table->decimal('payment_amount_ht', 10, 2)->nullable();
            $table->float('tva')->nullable();
            $table->decimal('payment_amount_tva', 10, 2)->nullable();
            $table->decimal('payment_discount', 10, 2)->nullable();
            $table->decimal('payment_amount_ttc', 10, 2)->nullable();
            $table->integer('payment_recipient')->nullable();
            $table->string('payment_path')->nullable();
            $table->longText('classroom')->nullable(); 
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('classroom_id')->nullable()->constrained('classrooms');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
