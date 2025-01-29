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
        Schema::create('application', function (Blueprint $table) {
            $table->id('application_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('reason');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->date('due_date')->nullable();
            $table->timestamps();
            $table->tinyInteger('is_deleted')->default(false);

            $table->foreign('product_id')
                  ->references('product_id')
                  ->on('products')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application');
    }
};
