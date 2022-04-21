<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientAPIController extends Controller
{
    //
    public function getAllPatient(){
        return Patient::all();
    }
    public function getPatient(Request $req){
        $pt=Patient::where('id',$req->id)->first();
        if($pt){
            return response()->json($pt,200);
        }
        return response()->json(["msg"=>"Patient Not Found"],404);
    }


    public function addPatient(Request $req){
        try{
            $pt = new  Patient ();
            $pt->name = $req->name;
            $pt->age = $req->age;
            $pt->problem = $req->problem;
            $pt->time = $req->time;
            $pt->fee = $req->fee;
            $pt->pdoc = $req->pdoc;
            $pt->save();

            if($pt->save()){

                return response()->json(["msg"=>"Patient Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Patient Could not be added"],500);
        }
        
        
        
    }

    public function updatePatient(Request $req){
        $pt=Patient::where('id',$req->id)->first();

        if($pt){
            try{
            $pt->name = $req->name;
            $pt->age = $req->age;
            $pt->problem = $req->problem;
            $pt->time = $req->time;
            $pt->fee = $req->fee;
            $pt->pdoc = $req->pdoc;
            $pt->save();
             
               
                if($pt->save()){
        
                    return response()->json(["msg"=>"Patient Updated Successfully"],200);
                }
            }
            catch(\Exception $ex){
                return response()->json(["msg"=>"Paitent could not updated"],500);
            }
               
        }
        return response()->json(["msg"=>"Patient Not Found"],404);
         
    }

    public function deletePatient($id){
        $pt=Patient::where('id',$id)->first();
        if($pt){ 
            $pt= $pt->delete();
            if ($pt){
                return response()->json(["msg"=>"Patient Delete Successfully"],200);
               }
               return response()->json(["msg"=>"Patient Delete Failed"],500);
         }
           return response()->json(["msg"=>"Patient Not Found"],404);
    }


}
