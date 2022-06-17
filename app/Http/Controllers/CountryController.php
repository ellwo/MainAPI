<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChatRoomResource;
use App\Models\Bussinse;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\City;
use App\Models\Country;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    //
    public function index(Request $request)
    {




        //Message::factory(10)->create();
        Cache::flush();


       // $user= Auth::user();
        $user=User::find(25);

         $chatrom=ChatRoom::find(5);



        //  if($chatrom->from_type!=User::class)
        //  return "yes is == ".$chatrom->from_type;
        //  else if($chatrom->to_type==Bussinse::class){

        //     return "yes to is == ".$chatrom->to_type;
        //  }



        //return dd($chatrom->lasttmessage());


        // return dd($chatrom);



       $bus= Bussinse::find(2);

        $_GET["chattings_id"]=$bus->id;
        $chatrom= $bus->chatrooms_only()->get();
                return ChatRoomResource::collection($chatrom)->additional(["chatting_id"=>$bus->id]);

        # code...
        $coun=[];//Country::with('bussinses.user','bussinses.cities','bussinses.parts')->paginate(2);


        $country=Country::all();

        return response($country);














        $user=auth()->user();

        $bus=Bussinse::find(6);

        $user->follow($bus);

        $bus=Bussinse::find(12);

        $user->follow($bus);

        $bus=Bussinse::find(8);

        $user->follow($bus);

        $bus=Bussinse::find(10);

        $user->follow($bus);

        return "Ddd";




       $user= User::find(1);


       //dd($user->block(Bussinse::find(10)));





       $user2=User::find(14);

       //$user->block($user2);
       $b=Bussinse::find(6);
       $user2->block($b);
       dd($b->chatrooms()->get());
    //  $user->block($b);

        $b->block($user);

        dd($b->startconvristion($user));
        $buss=Bussinse::withoutBlockingsOf($user)->get();
       dd($buss);




  // ChatMessage::create([

//   ]);

//    $chatm= ChatMessage::create([
//     'sender'=>3,
//     'convrstion_id'=>9,
//     'content'=>\Str::random(42),
//     'type_message'=>'text'

// ]);



    dd($b->startconvristion($user));
      dd($b->convristions);

//      dd($user->convristions()->where("to_id","=","18")->where("to_type","=",get_class($b))->delete());
//             dd( $user->convristions()->where("to_id",15)->get()==null );






       dd( $user->convristions()->get());











        $contr=Bussinse::first();

        dd($contr->country());


        //dd($coun); 806314265
     //   $buss=$coun->bussinses()->with('parts')->get();
       // dd($coun->bussinses()->with('parts')->get());

       $bus=[];//$coun->bussinses()->where('name','LIKE','%'.$request['search'].'%')->get();

       //$bussines=Bussinse::

      // dd($bus);
       if($request->has('api'))
       return response(['data'=>$coun],200);

       $cit=City::with('bussinses')->get();

    return view('country',['city'=>$cit])
        ;//dd($coun);
    }
}
