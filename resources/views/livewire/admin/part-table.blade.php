<div>
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="relative flex-col justify-between space-x-4 space-y-2 ">

                <x-label for="department_id" :value="__('اختر القسم ')" />

                <select  wire:model='dept' name="department_id" class="sm:pl-5 sm:pr-10 mx-2 w-4/5 sm:mx-0 dark:bg-darker dark:text-white text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none">
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

            <div class="w-full">
                <div >
                    {{ $part->links() }}
                </div>
                <div class="border-b border-gray-200 shadow my-8">
                    <table dir="rtl">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    الاسم
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    القسم
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    تعديل
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    حذف
                                </th>
                            </tr>
                        </thead>
                        <tbody  class="bg-white dark:bg-gray-600">
                            @foreach ( $part as $c )
                                <tr class="whitespace-nowrap">

                                    <td class="px-6 py-4">
                                        <div class="text-sm text-center text-gray-900 dark:text-white">
                                            {{ $c->name }}
                                        </div>
                                    </td>
                                    <td class=" py-4 text-sm text-gray-500 text-center dark:text-white">
                                            {{ $c->department->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('edit_Parts',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">تعديل</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('delet_Parts',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                            حذف
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    </div>

</div>
