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
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_name');
            $table->string('order_type');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->timestamps();
            $table->tinyInteger('is_deleted')->default(false);

            $table->foreign('product_id', 'application_id')
            ->references('product_id', 'application')
            ->on('products', 'application')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
