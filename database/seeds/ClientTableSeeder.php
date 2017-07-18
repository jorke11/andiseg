<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('clients')->insert([
            'regimen_id' => 1,
            'person_id' => 1,
            'city_id' => 1,
            'department_id' => 1,
            'status_id' => 1,
            'document_id' => 1,
            'document' => "2343234",
            'verification' => 1,
            'address' => "testing addres",
            'mobil' => "2343243",
            'business_name' => "Andiseg",
            'insert_id' => 1,
            'executive_id' => 2,
        ]);
    }

}
