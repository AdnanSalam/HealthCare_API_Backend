<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Needy;

class NeedyAPIController extends Controller
{
    //

    public function getAllNeedy(){
        return Needy::all();
    }
    public function getNeedy(Request $req){
        $ne=Needy::where('nid',$req->nid)->first();
        if($ne){
            return response()->json($re,200);
        }
        return response()->json(["msg"=>"Needy Not Found"],404);
    }


    public function addNeedy(Request $req){
        try{
            $ne = new  Needy ();
            $ne->nlocation = $req->nlocation;
            $ne->ndiscount = $req->ndiscount;
            $ne->ncontact = $req->ncontact;
            $ne->unid = $req->unid;
            
            $ne->save();

            if($ne->save()){

                return response()->json(["msg"=>"Needy Added Successfully"],200);
            }
        }
        catch(\Excereion $ex){
            return response()->json(["msg"=>"Needy Could not be added"],500);
        }
        
        
        
    }

    public function updateNeedy(Request $req){
        $ne=Needy::where('nid',$req->nid)->first();

        if($ne){
            try{
                
                $ne->nlocation = $req->nlocation;
                $ne->ndiscount = $req->ndiscount;
                $ne->ncontact = $req->ncontact;
                $ne->unid = $req->unid;
            $ne->save();
             
               
                if($ne->save()){
        
                    return response()->json(["msg"=>"Needy Updated Successfully"],200);
                }
            }
            catch(\Excereion $ex){
                return response()->json(["msg"=>"Needy could not updated"],500);
            }
               
        }
        return response()->json(["msg"=>"Needy Not Found"],404);
         
    }

    public function deleteNeedy($nid){
        $ne=Needy::where('nid',$nid)->first();
        if($ne){ 
            $ne= $ne->delete();
            if ($ne){
                return response()->json(["msg"=>"Needy Delete Successfully"],200);
               }
               return response()->json(["msg"=>"Needy Delete Failed"],500);
         }
           return response()->json(["msg"=>"Needy Not Found"],404);
    }
}


