<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\AgentModel;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Collection;
use Validator;
use App\Facades\ResponseHelper;

class AgentController extends Controller{
    
    function index(Request $request){
        $agent = AgentModel::where('type',1)->orderBy('created_at', 'desc')->get();
        return view('admin.agent.list_agent',compact('agent'));
    }
    
    function edit_agent(Request $request,$id){
        $agent = AgentModel::where('id',$id)->orderBy('created_at', 'desc')->first();
        return view('admin.agent.edit_agent',compact('agent'));
    }
    
    function add(Request $request){
            return view('admin.agent.add_agent');
    }
    
    
    public function create_agent(Request $request){
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required||regex:/^[\pL\s\-]+$/u',
                'email'=>'required|email|unique:users,email',
                'phone' => 'required|digits:10|unique:users,phone',
                'password' => 'required'
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
                 $agent_details = new AgentModel;
                $agent_details->name = $request->name;
                $agent_details->email = $request->email;
                 $agent_details->phone = $request->phone;
                $agent_details->type = 1;
                $agent_details->password = Hash::make($request->password);
                $agent_details->created_at = date('Y-m-d H:i:s');
                $agent_details->save();
                $success = true;
                $message = array('success'=>array('Agent added successfully'));
            }
            
            
         return ResponseHelper::returnResponse(200,$success,$message);
        }
        return view('backend.agent.create_agent');

    }
    
    
    public function edit_submit_agent(Request $request, $id){
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required',
                'email'=>'required|email',
                'phone'=>'required|digits:10',
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
                $update_arr = array(
                    "name" => $data['name'],
                    "email" => $data['email'],
                    "phone" => $data['phone'],
                    'updated_at' =>    date('Y-m-d H:i:s'),
                );
                $affectedRows = AgentModel::where("id", $id)->update($update_arr);
                $success = true;
                $message = array('success'=>array('Asset Types Name updated successfully'));
            }
            return ResponseHelper::returnResponse(200,$success,$message);
            }
    }
    
     public function destroy(Request $request, $id){
        if(AgentModel::where('id',$id)->exists()){
            $scm = AgentModel::find($id);
            $scm->delete();
           return redirect()->back();
        }
        else{
            return response()->json([
                "status"=>0,"message" => "Something Went Wrong!."
            ],201);
        }
    }
    
}
