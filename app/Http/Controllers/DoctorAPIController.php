<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorAPIController extends Controller
{
    //

    public function getAllDoctor(){
        return Doctor::all();
    }
    public function getDoctor(Request $req){
        $dr=Doctor::where('did',$req->did)->first();
        if($dr){
            return response()->json($dr,200);
        }
        return response()->json(["msg"=>"Doctor Not Found"],404);
    }


    public function addDoctor(Request $req){
        try{
            $dr = new  Doctor ();
            $dr->dname = $req->dname;
            $dr->dage = $req->dage;
            $dr->dtime = $req->dtime;
            $dr->dfield = $req->dfield;
            $dr->dfee = $req->dfee;
            
            $dr->save();

            if($dr->save()){

                return response()->json(["msg"=>"Doctor Added Successfully"],200);
            }
        }
        catch(\Excedrion $ex){
            return response()->json(["msg"=>"Doctor Could not be added"],500);
        }
        
        
        
    }

    public function updateDoctor(Request $req){
        $dr=Doctor::where('did',$req->did)->first();

        if($dr){
            try{
                
                $dr->dname = $req->dname;
                $dr->dage = $req->dage;
                $dr->dtime = $req->dtime;
                $dr->dfield = $req->dfield;
                $dr->dfee = $req->dfee;
            $dr->save();
             
               
                if($dr->save()){
        
                    return response()->json(["msg"=>"Doctor Updated Successfully"],200);
                }
            }
            catch(\Excedrion $ex){
                return response()->json(["msg"=>"Doctor could not updated"],500);
            }
               
        }
        return response()->json(["msg"=>"Doctor Not Found"],404);
         
    }

    public function deleteDoctor($did){
        $dr=Doctor::where('did',$did)->first();
        if($dr){ 
            $dr= $dr->delete();
            if ($dr){
                return response()->json(["msg"=>"Doctor Delete Successfully"],200);
               }
               return response()->json(["msg"=>"Doctor Delete Failed"],500);
         }
           return response()->json(["msg"=>"Doctor Not Found"],404);
    }
}
