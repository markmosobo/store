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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
            ->references('id')
            ->on('categories');
            $table->string('size')->nullable();
            $table->integer('pieces')->nullable();
            $table->float('buying_price')->nullable();
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')
            ->references('id')
            ->on('suppliers');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')
            ->references('id')
            ->on('users');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
