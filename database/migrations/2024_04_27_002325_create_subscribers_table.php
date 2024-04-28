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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('subscriber_arabic_name');
            $table->string('subscriber_english_name');
            $table->bigInteger('subscriber_reference');
            $table->string('subscriber_type');
            $table->string('identity_type');
            $table->bigInteger('identity_number');
            $table->text('arabic_address')->nullable();
            $table->text('english_address')->nullable();
            $table->text('about_subscriber_arabic')->nullable();
            $table->text('about_subscriber_english')->nullable();
            $table->string('subscriber_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
