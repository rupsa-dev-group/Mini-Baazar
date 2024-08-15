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
            $table->id();
            $table->string('coupon_name', 255);
            $table->string('coupon_code', 255);
            $table->decimal('discount', 8, 2);
            $table->string('dis_type');
            $table->string('start_date', 12);
            $table->string('end_date', 12);
            $table->string('status')->default(1);
            $table->string('cont_date')->default('1'); // Default to '1'
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
