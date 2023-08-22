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
        Schema::table('post_images', function (Blueprint $table) {
          $table->string('image')->default('no_image.jpg')->after('caption');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_images', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
