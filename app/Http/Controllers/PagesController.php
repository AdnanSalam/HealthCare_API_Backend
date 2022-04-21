<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;
use Mail;


class PagesController extends Controller
{
    //
    public function login(Request $req){
       
        $rep = Receptionist::where('remail',$req->remail)
        ->where('rpassword',$req->rpassword)
        ->first();
    
       
        if($rep){
           
            return response()->json(["msg"=>"Login Successfully"],200);
             
        }
         return response()->json(["msg"=>"Login Failed"],404);
  
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
}
