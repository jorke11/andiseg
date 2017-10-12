<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboralDetailTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('laboral_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('laboral_id');
            $table->integer('result_id');
            $table->string('business')->nullable();
            $table->string('activity')->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->datetime('fentry');
            $table->datetime('fdeparture');
            $table->string('contact');
            $table->string('concept');
            $table->string('position_contact');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('laboral_detail');
    }

}
