<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('email_newsletters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('subject');
            $table->string('file')->nullable();
            $table->text('body');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_newsletters');
    }
}
