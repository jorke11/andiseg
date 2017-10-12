<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomicileTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('domicile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('name');
            $table->string('last_name');
            $table->integer('document_id');
            $table->integer('document');
            $table->integer('city_expedition_id');
            $table->datetime('expedition_date');
            $table->integer('city_birth_id');
            $table->datetime('birth_date');
            $table->integer('blood_group');
            $table->integer('age');
            $table->integer('civil_status_id');
            $table->integer('time_married');
            $table->integer('quantity_child');
            $table->integer('address');
            $table->string('neighborhood');
            $table->string('location');
            $table->integer('stratum');
            $table->string('email');
            $table->string('aspiration');
            $table->string('phone');
            $table->integer('status_id');
            $table->text('concept')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('domicile');
    }

}
