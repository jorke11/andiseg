<?php

use Illuminate\Database\Seeder;

class SchedulesdetailTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('schedules_detail')->insert([
            'schedule_id' => 1,
            'course_id' => 1,
        ]);
    }

}
