<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReliefPackageGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relief_package_goods', function (Blueprint $table) {
            $table->id();
            $table->string('tbl_relief_package_id');
            $table->foreign('tbl_relief_package_id')->references('id')->on('relief_packages');
            $table->string('tbl_goods_stock_id');
            $table->foreign('tbl_goods_stock_id')->references('id')->on('goods_stocks');
            $table->decimal('quantity',8,2);
            $table->integer('days');
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
        Schema::dropIfExists('relief_package_goods');
    }
}
