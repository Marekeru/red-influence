<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Standardwerte einfügen
        \DB::table('settings')->insert([
            ['key' => 'site_title', 'value' => 'Marketing'],
            ['key' => 'site_subtitle', 'value' => 'for the unmarkatable'],
            ['key' => 'top_bar_text', 'value' => 'SUPPORTET DICH ALS SPICY CONTENT CREATOR / VERMARKTET DAS UNVERMARKTBARE / VON FRAUEN GEFÜHRT / VON TABU AUF TREND'],
            ['key' => 'logo_text', 'value' => 'red influence'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

