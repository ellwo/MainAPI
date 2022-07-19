<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;


class ContactUsController extends Controller
{
    public function contact(Request $request){

        return view('contact_us');
    }

    public function replay_con(Request $request){
        $mes=ContactUs::find($request['id']);

        // return dd($mes);
        return view('admin.contact.replay_contact',compact('mes'));



    }

    public function create_contact(Request $request){
     //   dd($request->all());


    //    $this->validate($request,[
    //        'name'=>'required|max:5',
    //        'message'=>'required|max:500',


    //    ]);

       ContactUs::create([


        'name'=>$request->name,
        'email'=>$request->email,
        'message'=>$request->message,
        'kind'=>$request->kind,
        'sabject'=>"requst",



       ]);
       return redirect()->back();


    }

    public function show_con(){
        $contac=ContactUs::all();
        return view('admin.contact.show_contacts',compact('contac'));
    }
    public function update_con(Request $request){

        $rep=ContactUs::find($request['mes']);

        // $rep->name=$request->name;
        // $rep->email=$request->email;
        // $rep->message=$request->message;
        // $rep->kind=$request->kind;
        // $rep->sabject="requst";
        $rep->massege_replay=$request->massege_replay;

        $rep->save();

        return back();

    }
}
