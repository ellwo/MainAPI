<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatRoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'to_id'=>$this->to_id,
            'from_id'=>$this->from_id,
            'to_type'=>$this->to_type,
            'from_type'=>$this->from_type,
            'unread_messages_count'=>$this->unreaded_messages($_GET["chattings_id"])->count(),
            'lasttmessage'=>$this->lasttmessage(),
            'chatable'=> $this->chatable( $_GET["chattings_id"]),
            'isitBlocked'=>$this->isitBlocked($_GET["chattings_id"])
        ];
    }






}
