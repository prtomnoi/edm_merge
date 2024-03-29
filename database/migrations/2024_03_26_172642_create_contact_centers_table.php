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
        Schema::create('contact_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('name');
            $table->string('email')->nullable()->comment('emial');
            $table->string('phone', 20)->nullable()->comment('phone');
            $table->string('user_company')->nullable()->comment('user company');
            $table->text('message')->nullable()->comment('message');
            $table->string('company')->nullable()->comment('company MEDIA, CENTER, MANAGEMENT');
            $table->string('status_email')->default('NOTSEND')->comment('SEND, NOTSEND');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_centers');
    }
};
