<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicDetailTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('academic_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('academic_id');
            $table->integer('study_id')->nullable();
            $table->string('obtained_title')->nullable();
            $table->string('institution')->nullable();
            $table->integer('concept_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('academic_detail');
    }

}
