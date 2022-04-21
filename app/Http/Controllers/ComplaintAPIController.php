<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintAPIController extends Controller
{
    //

    public function getAllComplaint(){
        return Complaint::all();
    }
    public function getComplaint(Request $req){
        $co=Complaint::where('cid',$req->cid)->first();
        if($co){
            return response()->json($co,200);
        }
        return response()->json(["msg"=>"Complaint Not Found"],404);
    }


    public function addComplaint(Request $req){
        try{
            $co = new  Complaint ();
            $co->ctype = $req->ctype;
            $co->cdetails = $req->cdetails;
            $co->cdate = $req->cdate;
            $co->save();

            if($co->save()){

                return response()->json(["msg"=>"Complaint Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Complaint Could not be added"],500);
        }
        
        
        
    }

    public function updateComplaint(Request $req){
        $co=Complaint::where('cid',$req->cid)->first();

        if($co){
            try{
            $co->name = $req->name;
            $co->age = $req->age;
            $co->problem = $req->problem;
            $co->time = $req->time;
            $co->fee = $req->fee;
            $co->pdoc = $req->pdoc;
            $co->save();
             
               
                if($co->save()){
        
                    return response()->json(["msg"=>"Complaint Updated Successfully"],200);
                }
            }
            catch(\Exception $ex){
                return response()->json(["msg"=>"Paitent could not updated"],500);
            }
               
        }
        return response()->json(["msg"=>"Complaint Not Found"],404);
         
    }

    public function deleteComplaint($cid){
        $co=Complaint::where('cid',$cid)->first();
        if($co){ 
            $co= $co->delete();
            if ($co){
                return response()->json(["msg"=>"Complaint Delete Successfully"],200);
               }
               return response()->json(["msg"=>"Complaint Delete Failed"],500);
         }
           return response()->json(["msg"=>"Complaint Not Found"],404);
    }
}
