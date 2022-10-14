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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('productName');

            $table->string('unitPrice');
            $table->string('stock');
            $table->string('unit');
            $table->string('description');
            $table->string('image')->nullable();
            $table->string('color');
            $table->string('brand');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

#migration alter_categories_table –table=”tableName”

#$table->unsignedBigInteger('categoryID')->nullable();
#$table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');