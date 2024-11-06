<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};