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
        if (Schema::hasTable('articles')) {
            if (Schema::hasColumn('articles', 'image_location')) {
                Schema::table('articles', function (Blueprint $table) {
                    $table->dropColumn('image_location');
                    $table->after('title', function (Blueprint $table) {
                        $table->string('image')->nullable();
                    });
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('articles')) {
            if (Schema::hasColumn('articles', 'image')) {
                Schema::table('articles', function (Blueprint $table) {
                    $table->dropColumn('image');
                    $table->after('title', function (Blueprint $table) {
                        $table->string('image_location')->nullable();
                    });
                });
            }
        }
    }
};
