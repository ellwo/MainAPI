<x-guest-layout>
<div class="container p-16">




    <table class="table rounded-2xl border table-auto w-12/12 ">

        <caption class="table-caption">


            @isset($country)

            {{$country->name}}
        </caption>
        <thead>
            <th>Bussinse</th>
            <th>Parts</th>
            <th>Owner</th>
            <th>Cities</th>
        </thead>
        <tfoot>
            <tr class="table-row">
                <td colspan="4">
                    <nav aria-label="Page navigation">
                        <ul class="inline-flex">
                          <li><button class="h-10 px-5 text-indigo-600 transition-colors duration-150 bg-white border border-r-0 border-indigo-600 rounded-l-lg focus:shadow-outline hover:bg-indigo-100">Prev</button></li>
                          <li><button class="h-10 px-5 text-indigo-600 transition-colors duration-150 bg-white border border-r-0 border-indigo-600 focus:shadow-outline">1</button></li>
                          <li><button class="h-10 px-5 text-indigo-600 transition-colors duration-150 bg-white border border-r-0 border-indigo-600 focus:shadow-outline hover:bg-indigo-100">2</button></li>
                          <li><button class="h-10 px-5 text-white transition-colors duration-150 bg-indigo-600 border border-r-0 border-indigo-600 focus:shadow-outline">3</button></li>
                          <li><button class="h-10 px-5 text-indigo-600 transition-colors duration-150 bg-white border border-indigo-600 rounded-r-lg focus:shadow-outline hover:bg-indigo-100">Next</button></li>
                        </ul>
                      </nav>
                </td>
            </tr>
        </tfoot>
        <tbody >



            @foreach ($country->bussinses as $bus)

            <tr class="table-row border">
            <td class="text-sm ">
                {{$bus->name}}

            </td>
            <td>
                    @foreach ($bus->parts as $b)
                    <span class="inline-block text-xs p-0.5 text-white mr-1 bg-pink-800 rounded-full">
                        {{$b->name}}
                    </span>

                    @endforeach

            </td>
            <td class="text-sm ">
                {{$bus->user->name}}
            </td>
            <td>
            </td>
            <td>
                @foreach ($bus->cities as $ci)
                <span class="inline-block text-xs p-0.5 text-white mr-1 bg-blue-300 rounded-full">
                    {{$ci->name}}
                </span>

                @endforeach
                {{$bus->cities->count()}}
            </td>

        </tr>

        @endforeach

        @endisset
    </tbody>
    </table>


</div>
</x-guest-layout>
