<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gateway_bills', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('payment_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('payment_gateway');
            $table->string('bill_code');
            $table->string('status');
            $table->decimal('amount', 10, 4);
            $table->dateTime('due_to');
            $table->text('url');
            $table->dateTime('paid_at')->nullable();
            $table->string('success_url')->nullable();
            $table->string('failed_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
