<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('parameters')->insert([
            'description' => "cedula",
            'value' => null,
            'group' => "type_document",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "nuevo",
            'value' => null,
            'group' => "status_order",
            'code' => 1,
        ]);

        DB::table('parameters')->insert([
            'description' => "A1",
            'value' => null,
            'group' => "category",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "A12",
            'value' => null,
            'group' => "category",
            'code' => 2,
        ]);

        DB::table('parameters')->insert([
            'description' => "primaria",
            'value' => null,
            'group' => "type_study",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "bachillerato",
            'value' => null,
            'group' => "type_study",
            'code' => 2,
        ]);
        DB::table('parameters')->insert([
            'description' => "pregunta?",
            'value' => null,
            'group' => "questions",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "testing anotations",
            'value' => null,
            'group' => "anotations",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "testing results",
            'value' => null,
            'group' => "results",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "Union libre",
            'value' => null,
            'group' => "civil_status",
            'code' => 1,
        ]);

        DB::table('parameters')->insert([
            'description' => "Primera",
            'value' => null,
            'group' => "class_military",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "sala",
            'value' => null,
            'group' => "photo",
            'code' => 1,
        ]);

        DB::table('parameters')->insert([
            'description' => "natural",
            'value' => null,
            'group' => "person_id",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "comun",
            'value' => null,
            'group' => "regimen_id",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "administrador",
            'value' => null,
            'group' => "role_id",
            'code' => 1,
        ]);
    }

}
