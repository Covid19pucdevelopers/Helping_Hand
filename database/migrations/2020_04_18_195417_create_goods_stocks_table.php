<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tbl_goods_id');
            $table->foreign('tbl_goods_id')->references('id')->on('goods');
            $table->decimal('quantity',8,2);
            $table->string('status');
            $table->tinyInteger('is_delete')->default(0);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable(); 
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
        Schema::dropIfExists('goods_stocks');
    }
}
