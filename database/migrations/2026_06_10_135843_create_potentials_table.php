<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('potentials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['pertanian', 'peternakan', 'wisata', 'kerajinan', 'perkebunan', 'lainnya']);
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->text('benefit')->nullable();
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('potentials');
    }
};
