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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->text('val'); // json qilish kk edi
            $table->unsignedBigInteger('group_id');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
        Schema::table('translations', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
        });
    }
};
