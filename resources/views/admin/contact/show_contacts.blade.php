<x-dashe-layout>

<div class="text-center col-xs-6 md-4">
<div class="flex flex-col w-full mx-auto overflow-x-scroll md:overflow-x-hidden ">
                <table class="table px-4 space-y-6 text-xs border-separate md:min-w-full sm:text-sm text-dark dark:text-light">
                    <thead class=" dark:text-light bg-light dark:bg-dark">
                        <tr class="text-xs">
                            <th class="p-3 text-right">الاسم </th>
                            <th class="p-3 text-right">البريد</th>
                            <th class="p-3 text-right">الرساله</th>
                            <th class="p-3 text-right">النوع</th>
                            <th class="p-3 text-right">العنوان </th>

                            <th class="p-3 text-right">عرض </th>

                        </tr>
                    </thead>
                    <tbody class="">

@foreach ($contac as $items)

<tr class="text-lg bg-white dark:bg-dark">

    <td class="p-3">
       {{ $items->name }}
    </td>
    <td class="p-3">
       {{ $items->email }}
    </td>
    <td class="p-3 ">
       {{ $items->message }}
    </td>
    <td class="p-3">
       {{ $items->kind }}
    </td>
    <td class="p-3">
       {{ $items->sabject }}
    </td>
    {{-- <td class="px-6 py-4">
        <a href="" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">
            رد
        </a>
    </td> --}}
    <td class="px-6 py-4">
        <a href=" {{route ('post.messegeRep',['id'=>$items->id])}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">
            عرض
        </a>
    <td>

    </td>

    </tr>
                        @endforeach
                    </tbody>
                </table>


</div>

</div>










</x-dashe-layout>
