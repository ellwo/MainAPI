<div class="sm:flex space-x-2">



    <div class="space-y-4 mx-2">
        <x-label for="department_id" :value="__('المدينة')" />

        <select   wire:model='city' name="city_id[]" class="pl-5  pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none  hover:border-gray-400 focus:outline-none">

           @foreach( $cities as $ca)
           <option  value="{{$ca->id}}">{{$ca->name}}</option>
           @endforeach

        </select>
    </div>
    <div class="space-y-4 mx-2">
        <x-label for="department_id" :value="__('السوق')" />
        <select   name="markt_id[]" class="pl-5  pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none  hover:border-gray-400 focus:outline-none">
           @foreach( $cityy->markts as $ca)
           <option  value="{{$ca->id}}">{{$ca->name}}</option>
           @endforeach

        </select>
    </div>

</div>
