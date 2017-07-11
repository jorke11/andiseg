<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Client;
use App\Models\Administration\Parameters;
use App\Models\Security\Users;
use DB;
use Auth;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {

        $client_q = DB::table("clients");

        $role_q = Parameters::where("group", "role_id");

        if (Auth::user()->role_id != 1) {
            $client_q->where("id", Auth::user()->client_id);
            $role_q->where("code", Auth::user()->role_id);
        }

        $client_id = $client_q->get();
        $role_id = $role_q->get();
        return view("Security.Users.init", compact("client_id", "role_id"));
    }

    public function create() {
        return "create";
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            try {
                $input = $request->all();
                unset($input["id"]);
                unset($input["confirmation"]);

                if ($input["password"] != '') {
                    $input["password"] = bcrypt($input["password"]);
                } else {
                    unset($input["password"]);
                }

                $input["status_id"] = 1;

                $user = Users::where("email", $input["email"])->first();

                if ($user == null) {

                    $user = Users::where("document", $input["document"])->first();

                    if ($user == null) {
                        $result = Users::create($input);
                        if ($result) {
                            return response()->json(['success' => true, "data" => $result]);
                        }
                    } else {
                        return response()->json(['success' => false, "msg" => "Documento ya existe!"], 409);
                    }
                } else {
                    return response()->json(['success' => false, "msg" => "email ya existe!"], 409);
                }
            } catch (Exception $exp) {
                return response()->json(['success' => false, "msg" => "Problemas con l ejecución"], 409);
            }
        }
    }

    public function edit($id) {
        $row = Users::FindOrFail($id);
        unset($row->password);
        return response()->json($row);
    }

    public function update(Request $request, $id) {
        $row = Users::FindOrFail($id);

        $input = $request->all();
        if (empty($input["password"])) {
            unset($input["password"]);
        } else {
            $input["password"] = bcrypt($input["password"]);
        }

        $result = $row->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id) {
        $row = Users::FindOrFail($id);
        $result = $row->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
