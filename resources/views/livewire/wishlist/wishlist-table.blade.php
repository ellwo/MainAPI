<div class="flex flex-col w-full mx-auto overflow-x-scroll md:overflow-x-hidden ">


    <div class="p-8 mx-auto md:w-1/2">

     @foreach ($cart as $c)

     <div class="flex justify-between p-4 bg-white border rounded-xl dark:bg-dark dark:text-white">

         <div class="flex flex-col">
             <a href="{{ route($c->options->routename,$c->id) }}"><img class="w-24 h-24 rounded-xl" src="{{ $c->options->img }}" alt=""></a>
             <h2 class="text-xl"><a href="{{ route($c->options->routename,$c->id) }}">{{ $c->name }}</a></h2>
             <h4 class="bg-yellow-400 rounded-full text-darker" >{{ $c->price."/ر.ي" }}</h4>
         </div>

         <div class="flex space-x-4">
             <div class="flex p-4 mr-2 bg-transparent cursor-pointer ">

                 <a href="{{ route( $c->options->routename=="service.show" ? 'serviceorder.create':'productorder.create', [$c->options->routename=="service.show"?'service':'product'=>$c->id]) }}" class="">

                     <div class="flex p-4 border rounded-full text-dark">
                         <x-bi-send-plus-fill class="w-12 h-12 text-yellow-400"/>
                     <span class="text-3xl dark:text-white">اطلب الان </span>
                     </div>
                 </a>
             </div>

             <div class="p-4 mx-4">
                 <div wire:click="removeitem('{{ $c->rowId }}')" class="flex p-2 text-white rounded-md bg-danger">
                     ازالة
                     <x-heroicon-s-x class="w-8 h-8"/>
                 </div>

             </div>

         </div>


     </div>

     @endforeach


    </div>






    </div>
