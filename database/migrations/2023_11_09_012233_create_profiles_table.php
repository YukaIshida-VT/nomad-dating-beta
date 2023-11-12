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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->boolean('is_nomad')->default(false)->comment('ノマド達成');
            $table->string('country')->comment('居住国または住んでみたい国');
            $table->string('occupation')->nullable()->comment('職業');
            $table->string('looking_for')->comment('探している相手');
            $table->string('gender')->comment('性別');
            $table->text('comment')->nullable()->comment('自己紹介');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
