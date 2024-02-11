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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('company_id')->index();

            $table->decimal('tax_rate', 20, 2);

            $table->string('provider_name')->nullable();
            $table->string('provider_email')->nullable();
            $table->string('provider_phone')->nullable();
            $table->string('provider_company')->nullable();
            $table->string('provider_vat_number')->nullable();
            $table->string('provider_reg_number')->nullable();
            $table->string('provider_iban')->nullable();
            $table->string('provider_swift')->nullable();

            $table->integer('client_type')->unsigned();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_phone');
            $table->string('client_company')->nullable();
            $table->string('client_vat_number')->nullable();
            $table->string('client_reg_number')->nullable();
            $table->string('client_iban')->nullable();
            $table->string('client_swift')->nullable();

            $table->boolean('paid')->default(0);
            $table->string('transaction_code')->nullable();

            $table->timestamps();
            $table->foreign('company_id')->on('companies')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
