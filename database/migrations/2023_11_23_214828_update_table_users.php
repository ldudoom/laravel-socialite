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
        Schema::table('users', function(Blueprint $table){
            $table->string('github_id', 128)->after('id')->nullable();
            $table->string('facebook_id', 128)->after('github_id')->nullable();
            $table->string('github_token', 128)->after('remember_token')->nullable();
            $table->string('github_refresh_token', 128)->after('github_token')->nullable();
            $table->string('facebook_token', 128)->after('github_refresh_token')->nullable();
            $table->string('facebook_refresh_token', 128)->after('facebook_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'github_id',
                'facebook_id',
                'github_token',
                'github_refresh_token',
                'facebook_token',
                'facebook_refresh_token'
            ]);
        });
    }
};
