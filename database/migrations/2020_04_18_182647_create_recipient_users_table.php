<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipient_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('user_name');
            $table->string('password');
            $table->unsignedBigInteger('tbl_category_id');
            $table->foreign('tbl_category_id')->references('id')->on('categories');
            $table->string('nid');
            $table->date('birth_date');
            $table->string('address');
            $table->string('image');
            $table->string('phone');
            $table->integer('earner_person');
            $table->integer('family_member');
            $table->date('request_time');
            $table->string('request_status');
            $table->string('status')->default('On');
            $table->tinyInteger('is_delete')->default(0);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
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
        Schema::dropIfExists('recipient_users');
    }
}
