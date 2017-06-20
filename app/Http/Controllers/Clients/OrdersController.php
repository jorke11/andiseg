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
use App\Models\Administration\Email;
use App\Models\Administration\EmailDetail;
use Mail;
use Auth;
use DB;

class OrdersController extends Controller {

    public $email;

    public function __construct() {
        $this->middleware("auth");
        $this->email = array();
    }

    public function index() {

        $esquemas = Schedules::all();

        $type_document = Parameters::where("group", "type_document")->get();
        $cities = Cities::all();
        $department = Department::all();

        foreach ($esquemas as $i => $value) {
            $esquemas[$i]->courses = SchedulesDetail::select("schedules_detail.id", "courses.description as course")
                            ->where("schedules_detail.schedule_id", $value->id)
                            ->join("courses", "courses.id", "schedules_detail.course_id")->get();
        }

//        dd($esquemas);

        return view("Clients.Orders.init", compact("esquemas", "type_document", "department", "cities"));
    }

    public function create() {
        return "create";
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);

            $input["status_id"] = 1;
            $input["insert_id"] = Auth::User()->id;

            $send = Email::where("description", "orders")->first();

            if ($send) {
                $det = EmailDetail::where("email_id", $send->id)->get();
                foreach ($det as $value) {
                    $this->email[] = $value->description;
                }
            }

            $result = Orders::create($input);
            if ($result) {
                $in = (array) DB::table("vorders")->where("id", $result->id)->first();

                if (count($this->email) > 0) {
                    Mail::send("Notifications.order", $in, function($msj) {
                        $msj->subject("notificacion");
                        $msj->to($this->email);
                    });
                }

                return response()->json(['success' => true, "data" => $result]);
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
