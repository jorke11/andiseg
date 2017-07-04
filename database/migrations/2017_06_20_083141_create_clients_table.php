<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('regimen_id')->nullable();
            $table->integer('person_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('status_id');
            $table->integer('document_id')->nullable();
            $table->string('document')->nullable();
            $table->integer('verification')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('mobil')->nullable();
            $table->string('business_name')->nullable();
            $table->integer("insert_id");
            $table->integer("update_id")->nullable();
            $table->integer("executive_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('clients');
    }

}
