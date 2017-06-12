<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration\Schedules;
use App\Models\Administration\SchedulesDetail;
use App\Models\Administration\Parameters;
use App\Models\Administration\Cities;
use App\Models\Administration\Department;
use App\Models\Clients\Orders;
use Mail;

class OrdersController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
//        $input = array();
//        Mail::send("Notifications.order", $input, function($msj) {
//            $msj->subject("notificacion");
//            $msj->to("jpinedom@hotmail.com");
//        });
//
//        echo "asd";
//        exit;
        $esquemas = Schedules::all();

        $type_document = Parameters::where("group", "type_document")->get();
        $cities = Cities::all();
        $department = Department::all();

        foreach ($esquemas as $i => $value) {
            $esquemas[$i]->courses = SchedulesDetail::select("schedules_detail.id", "courses.description as course")
                            ->where("schedules_detail.schedule_id", $value->id)
                            ->join("courses", "courses.id", "schedules_detail.course_id")->get();
        }
        return view("Clients.Orders.init", compact("esquemas", "type_document", "department", "cities"));
    }

    public function create() {
        return "create";
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
//            $user = Auth::User();
            $input["status_id"] = 1;
            $result = Orders::create($input);
            if ($result) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function edit($id) {
        $row = Orders::FindOrFail($id);
        return response()->json($row);
    }

    public function update(Request $request, $id) {
        $row = Orders::FindOrFail($id);
        $input = $request->all();
        $result = $row->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id) {
        $row = Orders::FindOrFail($id);
        $result = $row->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
