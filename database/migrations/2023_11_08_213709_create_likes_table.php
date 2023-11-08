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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('liking_user_id')->comment('いいねを送ったユーザーID');
            $table->unsignedBigInteger('liked_user_id')->comment('いいねをもらったユーザーID');
            $table->boolean('matching')->default(false)->comment('マッチング');
            $table->timestamps();
            $table->unique(['liking_user_id', 'liked_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
