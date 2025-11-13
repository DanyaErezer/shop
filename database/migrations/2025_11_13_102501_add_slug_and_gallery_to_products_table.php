<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name');
            $table->json('gallery')->nullable()->after('image'); // Для нескольких фото
            $table->string('category')->nullable()->after('description');
            $table->text('features')->nullable()->after('category'); // Характеристики
        });

        // Генерируем slug для существующих товаров
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $product->slug = Str::slug($product->name);
            $product->save();
        }
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['slug', 'gallery', 'category', 'features']);
        });
    }
};
