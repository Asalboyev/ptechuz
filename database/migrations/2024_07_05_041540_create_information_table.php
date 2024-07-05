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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('emails')->nullable();
            $table->string('header_phone')->nullable();
            $table->string('footer_phone1')->nullable();
            $table->string('footer_phone2')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
        DB::table('information')->insert([
            'emails' => 'admin@gmail.com',
            'header_phone' => '+998999999999',
            'footer_phone1' => '+998999999988',
            'footer_phone2' => '+998999999977',
            'instagram' => 'akhror.asalbayev',
            'telegram' => 'akhror_asalbayev',
            'facebook' => 'akhror_asalbayev',
            'linkedin' => 'akhror_asalbayev',

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
