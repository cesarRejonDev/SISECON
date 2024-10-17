<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('folio_number')->nullable()->unique();
            $table->date('duty_date');
            $table->foreignId('duty_type_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->foreign('created_by')->references('id')->on('users');
            $table->string('file_url')->nullable();
            $table->enum('status', ['Sin archivos', 'Aprobado', 'Cancelado'])->default('Sin archivos');
            $table->ulid('ulid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('duties');
    }
};
