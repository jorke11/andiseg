<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration\Parameters;
use App\Models\Administration\Cities;
use App\Models\Administration\Department;
use App\Models\Clients\Client;
use Auth;

class ClientsController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {

        $type_document = Parameters::where("group", "type_document")->get();
        $person_id = Parameters::where("group", "person_id")->get();
        $regimen_id = Parameters::where("group", "regimen_id")->get();
        $cities = Cities::all();
        $department = Department::all();

        return view("Clients.Client.init", compact("type_document", "cities", "department", "person_id", "regimen_id"));
    }

    public function create() {
        return "create";
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
            $input["insert_id"] = Auth::User()->id;
            $input["status_id"] = 1;
            
            $result = Client::create($input);
            if ($result) {
                return response()->json(['success' => true, "data" => $result]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function edit($id) {
        $row = Client::FindOrFail($id);
        return response()->json($row);
    }

    public function update(Request $request, $id) {
        $row = Client::FindOrFail($id);
        $input = $request->all();
        $result = $row->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id) {
        $row = Client::FindOrFail($id);
        $result = $row->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
