<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
                $table->after('password', function ($table) {
                    $table->string('provider')->nullable();
                    $table->integer('provider_id')->nullable();
                    $table->string('provider_token')->nullable();
                    $table->string('provider_refresh_token')->nullable();
                    $table->string('password')->nullable()->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
            $table->dropColumn('provider_token');
            $table->dropColumn('provider_refresh_token');
            $table->string('password')->change();
        });
    }
};
