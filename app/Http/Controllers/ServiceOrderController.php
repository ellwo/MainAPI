<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Service;
use App\Models\ServiceOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceOrderController extends Controller
{
    //

    public function create($service)
    {
        $product =Service::find($service);


        if($product!=null){
            $user=auth()->user();
            //return ;
            if($user->isBlocking($product->owner) || $product->owner->isBlocking($user))
            {
              return redirect()->back()->with('status','عذرا لايمكنك طلب المنتج الحالي ')->with('title','تنويه');
            }

            return view('service-orders.create',compact('product'));


    }


        //
    }

    public function store(Request $request)
    {
        //
        $user=Auth::user();

        $product=Service::find($request["product_id"]);
        $owner=$product->owner;
        $chatRoom=$user->startconvristion($owner);

        $order=ServiceOrder::create([
            'user_id'=>$user->id,
            'note'=>$request["note"],
            'address'=>$request["address"],
            'qun'=>$request["qty"],
            "service_id"=>$request["product_id"],
            'to_date'=>$request["to_date"]
        ]);

        $message=Message::create([
            'sender'=>$user->id,
            'content'=>$order->id,
            'type_message'=>'serorder',
            'chat_room_id'=>$chatRoom->id
        ]);

        try{
            event(new MessageSent($message));
        }catch(Exception $ex){

        }

        return redirect('inbox/user/'.$user->id.'/'.$chatRoom->id)->with('status',"تم ارسال الطلب بنجاح");

    }


}
