<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Product;
use App\Models\ProductOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product)
    {
        $product =Product::find($product);


        if($product!=null)
        return view('product-orders.create',compact('product'));


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user=Auth::user();

        $product=Product::find($request["product_id"]);
        $owner=$product->owner;
        $chatRoom=$user->startconvristion($owner);

        $order=ProductOrder::create([
            'user_id'=>$user->id,
            'note'=>$request["note"],
            'address'=>$request["address"],
            'qun'=>$request["qty"],
            "product_id"=>$request["product_id"],
        ]);

        $message=Message::create([
            'sender'=>$user->id,
            'content'=>$order->id,
            'type_message'=>'order',
            'chat_room_id'=>$chatRoom->id
        ]);

        try{
            event(new MessageSent($message));
        }catch(Exception $ex){

        }

        return redirect('inbox/user/'.$user->id.'/'.$chatRoom->id)->with('status',"تم ارسال الطلب بنجاح");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
