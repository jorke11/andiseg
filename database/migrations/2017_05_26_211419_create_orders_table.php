<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id');
            $table->integer('city_id');
            $table->integer('department_id');
            $table->integer('document');
            $table->integer('status_id');
            $table->string('name');
            $table->string('last_name');
            $table->text('address');
            $table->text('neighborhood');
            $table->string('phone');
            $table->string('movil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }

}
