<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;
Use Mail;

class ReceptionistAPIController extends Controller
{
    //
    public function getAllReceptionist(){
        return Receptionist::all();
    }
    public function getReceptionist(Request $req){
        $re=Receptionist::where('rid',$req->rid)->first();
        if($re){
            return response()->json($re,200);
        }
        return response()->json(["msg"=>"Receptionist Not Found"],404);
    }


    public function registration(Request $req){
        try{
            $re = new  Receptionist ();
            $re->rname = $req->rname;
            $re->rage = $req->rage;
            $re->remail = $req->remail;
            $re->rusername = $req->rusername;
            $re->rpassword = $req->rpassword;
            $re->rcontact = $req->rcontact;
            
            $re->save();

            if($re->save()){
            $data = ['name'=>"Adnan", 'data'=>'Hello People'];

       

            $emailAddress = $req->remail;

            $user['to'] = $emailAddress;

         try{
           Mail::send('mail',$data,function($messages) use ($user){

            $messages->to($user['to']);

            $messages->subject('laravel Mailing ');
        
         });
            return "Mail Sent Successfully";
       }
        catch(\Exception $ex){

         return "Mail Sent Failed";
       }
                    
      }
    }
        catch(\Excereion $ex){
            return response()->json(["msg"=>"Registration Failed"],500);
        }
    
  }
    
    public function mail(Request $request){
        $data = ['name'=>"Adnan", 'data'=>'Hello People'];

       

        $emailAddress = $request->remail;

        $user['to'] = $emailAddress;

    try{
        Mail::send('mail',$data,function($messages) use ($user){

            $messages->to($user['to']);

            $messages->subject('laravel Mailing ');
        
        });
            return "Mail Sent Successfully";
    }
    catch(\Exception $ex){

        return "Mail Sent Failed";
    }   
    }

    public function updateReceptionist(Request $req){
        $re=Receptionist::where('rid',$req->rid)->first();

        if($re){
            try{
                
                $re->rname = $req->rname;
            $re->rage = $req->rage;
            $re->remail = $req->remail;
            $re->rusername = $req->rusername;
            $re->rpassword = $req->rpassword;
            $re->rcontact = $req->rcontact;
            $re->save();
             
               
                if($re->save()){
        
                    return response()->json(["msg"=>"Receptionist Updated Successfully"],200);
                }
            }
            catch(\Excereion $ex){
                return response()->json(["msg"=>"Receptionist could not updated"],500);
            }
               
        }
        return response()->json(["msg"=>"Receptionist Not Found"],404);
         
    }

    public function deleteReceptionist($rid){
        $re=Receptionist::where('rid',$rid)->first();
        if($re){ 
            $re= $re->delete();
            if ($re){
                return response()->json(["msg"=>"Receptionist Delete Successfully"],200);
               }
               return response()->json(["msg"=>"Receptionist Delete Failed"],500);
         }
           return response()->json(["msg"=>"Receptionist Not Found"],404);
    }
}
