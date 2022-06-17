<?php

namespace App\GraphQL\Mutations;

use App\Models\Bussinse;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;

class StartChatRoomGQL
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $guard =  \Auth::guard(config('sanctum.guard', 'web'));

        $user=Auth::user();

        $model_id=$args["model_id"];
        $model_type=$args["model_type"];
        $type=\Str::is($model_type, 'User')?User::class:Bussinse::class;
        $model=(new $type)::find($model_id);

       $chatroom= $user->startconvristion($model);

        //return $model->username;
        //return get_class($model);
        return $chatroom;







    }
}
