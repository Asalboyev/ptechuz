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
        Schema::create('langs', function (Blueprint $table) {
            $table->id();
            $table->string('small')->unique();
            $table->string('lang');
            $table->timestamps();
        });
        DB::table('langs')->insert([
            'small' => 'en',
            'lang' => 'English'
        ]);
        // DB::table('langs')->insert([
        //     'small' => 'ru',
        //     'lang' => 'Rus'
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langs');
    }
};
