@props(["name"=>"" ,"mtitl"=>"","img"=>"","open"=>'false'])


<div

x-data='{isopen:{{$open}}}'
{{$attributes->merge(['class'=>'p-5 mx-auto bg-red-400'])}}>



    <h1>{{$name}}</h1>
    <x-button  @click="isopen=!isopen">
        oo
    </x-button>
    <h3 x-show="isopen" >{{$mtitl}}</h3>




</div>
