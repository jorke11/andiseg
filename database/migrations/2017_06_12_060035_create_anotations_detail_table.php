<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnotationsDetailTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('anotation_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anotation_id')->nullable();
            $table->integer('entity_id')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('certificate')->nullable();
            $table->string('anotation')->nullable();
            $table->text('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('anotation_detail');
    }

}
