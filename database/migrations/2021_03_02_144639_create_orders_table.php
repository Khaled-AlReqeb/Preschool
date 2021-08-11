<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
//            $table->unsignedBigInteger('client_id');
//            $table->unsignedBigInteger('store_id');
            $table->float('price');
            $table->integer('quantity')->default(0);;
//            $table->date('order_date');

            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

//            $table->foreign('client_id')
//                ->references('id')->on('clients')
//                ->onDelete('cascade');

//            $table->foreign('store_id')
//                ->references('id')->on('stores')
//                ->onDelete('cascade');



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
        Schema::dropIfExists('orders');
    }
}
