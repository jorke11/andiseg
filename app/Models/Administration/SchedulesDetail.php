<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class SchedulesDetail extends Model {

    protected $table = "schedules_detail";
    protected $primaryKey = "id";
    protected $fillable = ["id", "course_id", "schedule_id"];

}
