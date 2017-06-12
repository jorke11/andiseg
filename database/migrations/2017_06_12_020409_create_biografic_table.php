<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiograficTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('biografic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('status_id');
            $table->integer('city_expedition_id');
            $table->integer('city_birth_id');
            $table->integer('age');
            $table->integer('civil_status_id');
            $table->integer('passport')->nullable();
            $table->integer('militar_card')->nullable();
            $table->integer('classes')->nullable();
            $table->integer('district')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('profession')->nullable();
            $table->string('driving_licence')->nullable();
            $table->integer('professional_card')->nullable();
            $table->string('email')->nullable();
            $table->string('eps');
            $table->string('pensiones');
            $table->string('phone2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('biografic');
    }

}
