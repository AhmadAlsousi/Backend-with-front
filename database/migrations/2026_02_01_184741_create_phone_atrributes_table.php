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
        Schema::create('phone_atrributes', function (Blueprint $table) {
            $table->id();
              $table->string('sim_card');
            $table->string('sim_card_type');
            $table->string('display');
            $table->string('camera');
            $table->string('front_camera');
            $table->string('processor');
            $table->string('internal_memory');
            $table->string('ram');
            $table->string('memory_card');
            $table->string('operating_system');
            $table->string('battery');
            $table->string('dimensions');
            $table->string('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_atrributes');
    }
};
