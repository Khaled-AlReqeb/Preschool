<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id');
//            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullabel();
            $table->string('ar_name');
            $table->string('en_name')->nullable();
            $table->text('ar_description');
            $table->text('en_description')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('per_order')->default(1);
            $table->float('discount')->default(0);
            $table->string('end_discount')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('cascade');

//            $table->foreign('category_id')
//                ->references('id')->on('sub_categories')
//                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
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
}
