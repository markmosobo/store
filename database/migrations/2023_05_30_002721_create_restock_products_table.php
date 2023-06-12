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
        Schema::create('restock_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
            ->references('id')
            ->on('products');
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')
            ->references('id')
            ->on('suppliers');
            $table->integer('pieces')->nullable();
            $table->float('buying_price')->nullable();
            $table->text('comments')->nullable();
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')
            ->references('id')
            ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restock_products');
    }
};
