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
            $table->integer('event_id')->nullable();
            $table->integer('responsible_id')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->text('address');
            $table->text('neighborhood');
            $table->text('cost_center');
            $table->text('position');
            $table->string('phone');
            $table->string('mobil');
            $table->integer('insert_id')->nullable();
            $table->integer('update_id')->nullable();
            $table->integer('schema_id')->nullable();
            $table->datetime("assigned")->nullable();
            $table->datetime("finalized")->nullable();
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
