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
use App\Models\Security\Users;
use App\Models\Clients\Client;
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
        $users = Users::where("role_id", 3)->get();
        $cities = Cities::all();
        $department = Department::all();

        foreach ($esquemas as $i => $value) {
            $esquemas[$i]->courses = SchedulesDetail::select("schedules_detail.id", "courses.description as course")
                            ->where("schedules_detail.schedule_id", $value->id)
                            ->join("courses", "courses.id", "schedules_detail.course_id")->get();
        }

        return view("Clients.Orders.init", compact("esquemas", "type_document", "department", "cities", "users"));
    }

    public function create() {
        return "create";
    }

    public function updateAssociate(Request $req, $id) {
        $in = $req->all();

        $user = Users::find($in["user_id"]);

        $in["name"] = $user->name;
        $in["last_name"] = $user->last_name;
        $this->email[] = $user->email;

        $in = (array) DB::table("vorders")->where("id", $id)->first();

        Mail::send("Notifications.associate", $in, function($msj) {
            $msj->subject("notificacion");
            $msj->to($this->email);
        });

        $order = Orders::find($id);
        $order->responsible_id = $user->id;
        $order->assigned = date("Y-m-d H:i:s");
        $order->status_id = 2;
        $order->event_id = 2;
        $order->save();

        return response()->json(['success' => true]);
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);

            $input["status_id"] = 1;
            $input["event_id"] = 1;
            $input["insert_id"] = Auth::User()->id;

            try {
                DB::beginTransaction();

                $send = Email::where("description", "orders")->first();

                $client = Client::find(Auth::User()->client_id);
                $executive = Users::find($client->executive_id);

                $this->email[] = $executive->email;
                $this->email[] = Auth::user()->email;

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
                    DB::commit();
                    return response()->json(['success' => true, "data" => $result]);
                } else {
                    DB::rollback();
                    return response()->json(['success' => false, "msg" => "Problemas con la ejecución"], 409);
                }
            } catch (Exception $excep) {
                DB::rollback();
                return response()->json(['success' => false, "msg" => "Problemas con la ejecución"], 409);
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
