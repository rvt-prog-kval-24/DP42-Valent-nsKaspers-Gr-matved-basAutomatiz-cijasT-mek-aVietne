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
        Schema::create('stripe_tokens', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id')->index();
            $table->string('token', 500);
            $table->foreign('invoice_id')->on('invoices')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe_tokens');
    }
};
