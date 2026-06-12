<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('village_name');
            $table->string('tagline')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('history')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('district')->nullable();
            $table->string('regency')->nullable();
            $table->string('province')->nullable();
            $table->decimal('area', 10, 2)->nullable()->comment('Luas wilayah dalam km2');
            $table->integer('altitude')->nullable()->comment('Ketinggian dalam mdpl');
            $table->string('north_border')->nullable();
            $table->string('south_border')->nullable();
            $table->string('east_border')->nullable();
            $table->string('west_border')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->time('office_open')->nullable();
            $table->time('office_close')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('village_logo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};
