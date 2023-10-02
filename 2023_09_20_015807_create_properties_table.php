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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('sales_type');
            $table->string('property_type');
            $table->Integer('floor_number')->nullable();
            $table->string('location');
            $table->text('address');
            $table->Integer('zipcode');
            $table->string('property_size');
            $table->string('lot_size');
            $table->Integer('bedroom')->nullable();
            $table->Integer('bathroom')->nullable();
            $table->Integer('garage')->nullable();
            $table->string('property_condition');
            $table->string('currency');
            $table->string('price');
            $table->date('date');
            $table->text('description');
            $table->string('image');
            $table->string('document');
            $table->Integer('approval')->default(0);
            $table->unSignedBigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
