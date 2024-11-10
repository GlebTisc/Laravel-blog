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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->unique();
            $table->string('surname')->nullable();
            $table->string("avatar")->nullable();
            $table->string("phone")->unique()->nullable();
            $table->string('sex')->nullable();
            $table->boolean('showPhone')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('surname');
            $table->dropColumn('avatar');
            $table->dropColumn('phone');
            $table->dropColumn('sex');
            $table->dropColumn('showPhone');
        });
    }
};
