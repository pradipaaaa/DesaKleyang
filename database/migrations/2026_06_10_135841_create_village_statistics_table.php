<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('total_population')->default(0);
            $table->integer('male_population')->default(0);
            $table->integer('female_population')->default(0);
            $table->integer('total_families')->default(0);
            $table->integer('total_dusun')->default(0);
            $table->integer('total_rw')->default(0);
            $table->integer('total_rt')->default(0);
            $table->integer('total_umkm')->default(0);
            $table->integer('total_officials')->default(0);
            $table->year('year')->default(2024);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_statistics');
    }
};
