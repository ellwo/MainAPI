<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'chat_room_id'=>$this->chat_room_id,
            'is_readed'=>$this->is_readed,
            'sender'=>$this->sender,
            'type_message'=>$this->type_message,
            'content_tochat'=>$this->get_content_tochatroom(),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
