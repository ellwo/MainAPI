<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $fillable=[
        'sender','type_message',
        'is_readed',
        'chat_room_id',
        'content'

    ];
    /**
 * The attributes that should be cast.
 *
 * @var array
 */
protected $casts = [
    'created_at' => 'datetime:h:i A',
];


public function getContentAttribute($value)
{   if($this->type_message=='text')
    return $value;
    else if($this->type_message=='order'){
        $content=null;

        $order=ProductOrder::with('product')->where('id','=',$value)->first();
        if($order!=null)
        {
            $content=[
                'product'=>$order->product,
                'order'=>$order,
                'routename'=>route('product.show',$order->product->id)
            ];
        }
        else{
            $content="يبدو ان هذه الرسالة لم تعد موجودة";
        }

    return $content;
    }
    else{
        return $value;
    }

    # code...
}
    function chatroom(){
        return $this->belongsTo(ChatRoom::class);
    }


    public function get_content_tochatroom()
    {
        if($this->type_message=='text')
        return $this->content;
        else if($this->type_message=='order'){
            $content=null;

            $order=ProductOrder::with('product')->where('id','=',$this->content)->first();
            if($order!=null)
            {
                $content=[
                    'product'=>$order->product,
                    'order'=>$order
                ];
            }
            else{
                $content="يبدو ان هذه الرسالة لم تعد موجودة";
            }

        return $content;
        }
        else{
            return $this->content;
        }
        # code...
    }

    function mdate(){


      //  Carbon::parse(Date::now())->eq($this->created_at);
        return Carbon::parse($this->created_at)->format('d M Y'); // grouping by months

    }
}
