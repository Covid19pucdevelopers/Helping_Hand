<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReliefDonatedListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relief_donated_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tbl_recipient_user_id');
            $table->foreign('tbl_recipient_user_id')->references('id')->on('recipient_users');
            $table->unsignedBigInteger('tbl_user_id');
            $table->foreign('tbl_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('tbl_relief_package_goods_id');
            $table->foreign('tbl_relief_package_goods_id')->references('id')->on('relief_package_goods');
            $table->date('date');
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
        Schema::dropIfExists('relief_donated_lists');
    }
}
