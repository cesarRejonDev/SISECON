<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('duty_incidents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('duty_id')->constrained();
            $table->foreignId('incident_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('duty_incidents');
    }
};
