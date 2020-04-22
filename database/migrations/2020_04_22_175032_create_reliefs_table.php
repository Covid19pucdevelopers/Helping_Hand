<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReliefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reliefs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('area_id');
            $table->string('address');
            $table->string('nid');
            $table->integer('members_in_family');
            $table->integer('earning_members');
            $table->string('image');
            $table->decimal('lat',8,2);
            $table->decimal('long',8,2);
            $table->string('contact_no');
            $table->date('date_given');
            $table->bigInteger('given_by');
            $table->bigInteger('given_to');
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
        Schema::dropIfExists('reliefs');
    }
}
