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
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('code')->unique();

            // fixed or percentage
            $table->enum('type', ['fixed', 'percentage']);

            $table->decimal('value', 10, 2);

            $table->decimal('minimum_order', 10, 2)->default(0);

            $table->decimal('maximum_discount', 10, 2)->nullable();

            $table->unsignedInteger('usage_limit')->nullable();
            $table->unsignedInteger('used_count')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
