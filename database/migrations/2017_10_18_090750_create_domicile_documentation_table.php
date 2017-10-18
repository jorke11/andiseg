<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomicileDocumentationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('domicile_documentation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('document_id');
            $table->integer('document');
            $table->datetime('expedition_date');
            $table->integer('classes_id');
            $table->integer('category_id');
            $table->integer('district');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('domicile_documentation');
    }

}
