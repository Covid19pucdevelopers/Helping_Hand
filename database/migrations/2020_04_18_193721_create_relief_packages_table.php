<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReliefPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relief_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('relief_packages');
    }
}
