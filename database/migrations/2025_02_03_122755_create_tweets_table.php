<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 新規に追加するテーブルや拡張するカラムなどのスキーマを指定
     */
    public function up(): void
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->timestamps(); //created_at, updated_atの2つのカラムを作成
        });
    }

    /**
     * Reverse the migrations.
     * 戻す際の処理
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');
    }
};
