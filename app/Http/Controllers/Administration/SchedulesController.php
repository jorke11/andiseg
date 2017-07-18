<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration\Courses;
use App\Models\Administration\Schedules;
use App\Models\Administration\SchedulesDetail;
use DB;

class SchedulesController extends Controller {

    public function __construct() {
        date_default_timezone_set("America/Bogota");
        $this->middleware("auth");
    }

    public function index() {
        $courses = Courses::all();
        return view("Administration.schedules.init", compact("courses"));
    }

    public function create() {
        return "create";
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
            $result = Schedules::create($input)->id;
            if ($result) {
                $header = Schedules::findOrfail($result);
                return response()->json(['success' => true, "header" => $header]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function storeDetail(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
            $result = SchedulesDetail::create($input);
            if ($result) {
                $detail = $this->getDetailAll($input["schedule_id"]);
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function getDetailAll($id) {
        return DB::table("schedules_detail")
                        ->select("schedules_detail.id", "schedules_detail.schedule_id",  "courses.description as course","schedules_detail.course_id")
                        ->join("courses", "courses.id", "schedules_detail.course_id")
                        ->where("schedules_detail.schedule_id", $id)
                        ->get()->toArray();
    }

    public function getDetail($id) {
        return (array) DB::table("schedules_detail")
                        ->select("schedules_detail.id", "schedules_detail.schedule_id", "schedules_detail.day", "locations.description as location", "courses.description as course", "schedules_detail.hour", "schedules_detail.duration", "schedules_detail.course_id")
                        ->join("courses", "courses.id", "schedules_detail.course_id")
                        ->where("schedules_detail.id", $id)
                        ->first();
    }

    public function edit($id) {
        $header = Schedules::FindOrFail($id);
        $detail = $this->getDetailAll($id);
        return response()->json(["success" => true, "header" => $header, "detail" => $detail]);
    }

    public function update(Request $request, $id) {
        $category = Schedules::FindOrFail($id);
        $input = $request->all();
        $result = $category->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id) {
        $record = Schedules::FindOrFail($id);
        $day = $record->day;

        $result = $record->delete();
        if ($result) {
            $data = $this->getTable($day, 0)->getData();
            return response()->json(['success' => true, "data" => $data->data]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroyItem(Request $req, $id) {
        $input = $req->all();
        $record = SchedulesDetail::FindOrFail($id);
        $result = $record->delete();

        if ($result) {
            $detail = $this->getDetailAll($input["schedule_id"]);
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
