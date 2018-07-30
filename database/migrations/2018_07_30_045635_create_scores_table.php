<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id');
            $table->string('test_name');
            $table->integer('applicant_id');
            $table->string('section1')->nullable();
            $table->string('section2')->nullable();
            $table->string('section3')->nullable();
            $table->string('section4')->nullable();
            $table->string('section5')->nullable();
            $table->string('section6')->nullable();
            $table->string('section7')->nullable();
            $table->string('section8')->nullable();
            $table->string('date')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('scores');
    }
}
