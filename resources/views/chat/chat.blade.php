<x-dashe-layout>



<x-auth-session-status :status='session("status")'/>
    <div id="app"   class="fixed left-0 right-0 flex flex-col max-w-5xl rounded-lg sm:top-32 sm:left-24 dark:bg-darker sm:right-24 bottom-24 h-3/4 sm:mx-auto bg-light ">




        <router-view userid="{{ $userid }}" chattings="{{ $chattings }}" chat_room_id="{{ $chat_room_id }}" type="{{ $type }}"/>


  </div>





</x-dashe-layout>
