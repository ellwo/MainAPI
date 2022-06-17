<x-dashe-layout>




    <div id="app"   class="fixed left-0 right-0 flex flex-col max-w-5xl rounded-lg sm:top-32 sm:left-24 dark:bg-darker sm:right-24 bottom-24 h-3/4 sm:mx-auto bg-light ">

        @if ($id=="all")

    <router-view userid="{{auth()->user()->id}}" chattings="{{auth()->user()->id}}" type="user"  />

        @else
        <router-view userid="{{$id}}" type="{{$type}}" />

        @endif

  </div>





</x-dashe-layout>
