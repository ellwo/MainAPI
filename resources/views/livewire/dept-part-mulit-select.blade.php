<div >
    <div >
        <div class="flex  p-8 mx-auto " >


            <div class="sm:flex" >
            <div class="relative inline-flex flex-col items-center space-y-4">

                <x-label for="department_id" :value="__('اختر القسم ')" />

                <select  wire:model.debounce='dept' name="department_id" class="h-10 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-full appearance-none hover:border-gray-400 focus:outline-none">
                   @if ($type=='all')

                   @foreach( $catgraies as $ca)
                   <option  value="{{$ca->id}}">{{$ca->name}}</option>
                   @endforeach
                   @else

                    @foreach( $catgraies->where('type','=',$type) as $ca)
                    <option  value="{{$ca->id}}">{{$ca->name}}</option>
                    @endforeach
                   @endif
                </select>
              </div>

              @if (isset($selected))

              @include('components.mulit-select',
              ['id'=>'part'.$dept,
              'inputname'=>'parts',
              'items'=>$department->parts,
              'lablename'=>'الفئات',
              'selected'=>$selected

              ])
              @else

              @include('components.mulit-select',
              ['id'=>'part'.$dept,
              'inputname'=>'parts',
              'items'=>$department->parts,
              'lablename'=>'الفئات',

              ])
              @endif

            </div>




        </div>

</div>
</div>
