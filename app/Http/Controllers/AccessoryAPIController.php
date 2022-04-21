<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;

class AccessoryAPIController extends Controller
{
    //
    public function getAllAccessory(){
        return Accessory::all();
    }
    public function getAccessory(Request $req){
        $ac=Accessory::where('aid',$req->aid)->first();
        if($ac){
            return response()->json($ac,200);
        }
        return response()->json(["msg"=>"Accessory Not Found"],404);
    }


    public function addAccessory(Request $req){
        try{
            $ac = new  Accessory ();
            $ac->apen = $req->apen;
            $ac->aleaflet = $req->aleaflet;
            $ac->alaptop = $req->alaptop;
            
            
            $ac->save();

            if($ac->save()){

                return response()->json(["msg"=>"Accessory Added Successfully"],200);
            }
        }
        catch(\Excereion $ex){
            return response()->json(["msg"=>"Accessory Could not be added"],500);
        }
        
        
        
    }

    public function updateAccessory(Request $req){
        $ac=Accessory::where('aid',$req->aid)->first();

        if($ac){
            try{
                
                $ac->apen = $req->apen;
                $ac->aleaflet = $req->aleaflet;
                $ac->alaptop = $req->alaptop;
            $ac->save();
             
               
                if($ac->save()){
        
                    return response()->json(["msg"=>"Accessory Updated Successfully"],200);
                }
            }
            catch(\Excereion $ex){
                return response()->json(["msg"=>"Accessory could not updated"],500);
            }
               
        }
        return response()->json(["msg"=>"Accessory Not Found"],404);
         
    }

    public function deleteAccessory($aid){
        $ac=Accessory::where('aid',$aid)->first();
        if($ac){ 
            $ac= $ac->delete();
            if ($ac){
                return response()->json(["msg"=>"Accessory Delete Successfully"],200);
               }
               return response()->json(["msg"=>"Accessory Delete Failed"],500);
         }
           return response()->json(["msg"=>"Accessory Not Found"],404);
    }
}
