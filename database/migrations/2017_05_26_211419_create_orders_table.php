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
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('address')->nullable();
            $table->text('neighborhood')->nullable();
            $table->text('cost_center')->nullable();
            $table->text('position')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobil')->nullable();
            $table->integer('insert_id')->nullable();
            $table->integer('update_id')->nullable();
            $table->integer('schema_id')->nullable();
            $table->datetime("assigned")->nullable();
            $table->datetime("finalized")->nullable();
            $table->text("comment")->nullable();
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
        Schema::dropIfExists('orders');
    }

}
