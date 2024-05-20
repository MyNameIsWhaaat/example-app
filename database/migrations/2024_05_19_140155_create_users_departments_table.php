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
        Schema::create('users_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();
    
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->unique('user_department_user_foreign');
            
            $table->foreign('department_id')
            ->references('id')->on('departments')
            ->onDelete('cascade')
            ->unique('user_department_department_foreign');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_departments');
    }
};
