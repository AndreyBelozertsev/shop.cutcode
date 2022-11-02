<?php

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('images')->nullable();
            $table->double('price', 8, 2);
            $table->text('description')->nullable();

            $table->foreignIdFor(Brand::class)
                    ->nullable()
                    ->constrained()
                    ->onUpdate('cascade')
                    ->nullOnDelete('cascade');
            $table->boolean('status')->default(true);
            $table->integer('sort')->default(500);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignIdFor(Product::class)
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
            Schema::dropIfExists('category_product');
            Schema::dropIfExists('products');
        }
    }
};
