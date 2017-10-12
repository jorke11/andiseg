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
            'description' => "Creado",
            'value' => null,
            'group' => "events",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "Asignado",
            'value' => null,
            'group' => "events",
            'code' => 2,
        ]);
        DB::table('parameters')->insert([
            'description' => "Revision Biografica",
            'value' => null,
            'group' => "events",
            'code' => 3,
        ]);
        DB::table('parameters')->insert([
            'description' => "Revision academica",
            'value' => null,
            'group' => "events",
            'code' => 4,
        ]);
        DB::table('parameters')->insert([
            'description' => "Revision Juridica",
            'value' => null,
            'group' => "events",
            'code' => 5,
        ]);
        DB::table('parameters')->insert([
            'description' => "Revision anotaciones",
            'value' => null,
            'group' => "events",
            'code' => 6,
        ]);
        DB::table('parameters')->insert([
            'description' => "Revision Laboral",
            'value' => null,
            'group' => "events",
            'code' => 6,
        ]);
        
        DB::table('parameters')->insert([
            'description' => "Visitar domiciliaria",
            'value' => null,
            'group' => "events",
            'code' => 7,
        ]);

        DB::table('parameters')->insert([
            'description' => "cedula",
            'value' => null,
            'group' => "type_document",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "nit",
            'value' => null,
            'group' => "type_document",
            'code' => 2,
        ]);
        DB::table('parameters')->insert([
            'description' => "nuevo",
            'value' => null,
            'group' => "status_order",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "En proceso",
            'value' => null,
            'group' => "status_order",
            'code' => 2,
        ]);
        DB::table('parameters')->insert([
            'description' => "Finalizado",
            'value' => null,
            'group' => "status_order",
            'code' => 3,
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
        DB::table('parameters')->insert([
            'description' => "Ejecutivo",
            'value' => null,
            'group' => "role_id",
            'code' => 2,
        ]);
        DB::table('parameters')->insert([
            'description' => "operador",
            'value' => null,
            'group' => "role_id",
            'code' => 3,
        ]);
        DB::table('parameters')->insert([
            'description' => "cliente",
            'value' => null,
            'group' => "role_id",
            'code' => 4,
        ]);

        DB::table('parameters')->insert([
            'description' => "cruz blanca",
            'value' => null,
            'group' => "eps_id",
            'code' => 1,
        ]);
        DB::table('parameters')->insert([
            'description' => "porvenir",
            'value' => null,
            'group' => "pension_id",
            'code' => 1,
        ]);
    }

}
