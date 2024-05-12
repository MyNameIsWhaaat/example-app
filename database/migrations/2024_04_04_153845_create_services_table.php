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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('idEmployee'); // Добавляем колонку idEmployee
            // Добавляем внешний ключ для колонки idEmployee, предполагая, что она ссылается на таблицу employees
            $table->foreign('idEmployee')
                ->references('id')
                ->on('employees');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
