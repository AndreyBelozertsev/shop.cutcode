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
        Schema::table('brands', function (Blueprint $table) {
            $table->after('sort', function ($table) {
                $table->boolean('is_home_page')->default(false);
            });
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->after('sort', function ($table) {
                $table->boolean('is_home_page')->default(false);
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
        if(app()->isLocal()){
            Schema::table('brands', function (Blueprint $table) {
                $table->dropColumn('is_home_page');
            });
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('is_home_page');
            });
        }
    }
};