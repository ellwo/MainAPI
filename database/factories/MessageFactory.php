<?php

namespace Database\Factories;

use App\Models\ChatRoom;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{

    /*
    *
     @var string
    */
   protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        $chatroom=ChatRoom::inRandomOrder()->first();

        $sender=0;
        $who=rand(1,2);

        if($who==1)
        $sender=$chatroom->from_id;
        else
        $sender=$chatroom->to_id;


        return [
            'content'=>$this->faker->text(rand(15,80)),
            'sender'=>$sender,
            'chat_room_id'=>$chatroom->id,
            'is_readed'=>false,
            'type_message'=>'text'
            //
        ];
    }
}
