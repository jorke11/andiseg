<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('cities')->insert([
            'description' => "city test",
            'department_id' => 1,
            'code' => 10010,
        ]);
    }

}
