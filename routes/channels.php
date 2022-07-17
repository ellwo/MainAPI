<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel("userchatrooms.{id}",function($id){
    return true;

});
Broadcast::channel('usernotfiyMessage.{id}',function(){
   return true;
});

Broadcast::channel("chatroom.{id}",function(){

    return true;
    //    if(Auth::check())
//     return true;
//     else
//     return false;

});
Broadcast::channel("UserNotify.{id}",function(){

    return true;
    //    if(Auth::check())
//     return true;
//     else
//     return false;

});
