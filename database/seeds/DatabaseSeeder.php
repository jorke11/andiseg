<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(SchedulesdetailTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(EmailTableSeeder::class);
    }

}
