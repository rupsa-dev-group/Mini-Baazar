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
        Schema::create('scategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mcategory_id');
            $table->foreign('mcategory_id')->references('id')->on('mcategories')->onDelete('cascade');
            $table->string('s_name',255);
            $table->string('s_slug',255);
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scategories');
    }
};
