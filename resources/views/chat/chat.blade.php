<x-dashe-layout>



<x-auth-session-status :status='session("status")'/>




    <div id="app"    class="fixed left-0 right-0 flex flex-col max-w-5xl rounded-lg bottom-4 sm:top-32 sm:left-24 dark:bg-darker h-5/6 md:h-3/4 sm:right-24 md:bottom-24 sm:mx-auto bg-light ">




        <router-view userid="{{ $userid }}" chattings="{{ $chattings }}" chat_room_id="{{ $chat_room_id }}" type="{{ $type }}"/>


  </div>





</x-dashe-layout>
