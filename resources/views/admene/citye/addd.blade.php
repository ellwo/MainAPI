<x-dashe-layout>
                <div class="border-2 rounded-lg px-8 py-4 mx-16 my-16 border-blue-900 shadow-sm">
                    <form class="text-right " action="{{route('save_city')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                          <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم المدية</label>
                          <input name="name" type="text" id="city" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="المدينة" required>
                          @error("name")
                              <span class="text-danger rounded-md" >{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="mb-6">
                          <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الدولة</label>
                          {{-- <input type="text" id="password" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required> --}}
                          <select id="country"  name="county_id" class=" dark:text-white dark:bg-gray-700 w-full text-right">
                              @foreach ($country as $c )
                                  <option value="{{$c->id}}">{{ $c->name }}</option>
                              @endforeach

                          </select>
                        </div>
                        <input type="submit" class="transition-all w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      </form>
                </div>



                <div class="container flex justify-center mx-auto">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <div class="border-b border-gray-200 shadow my-8">
                                <table>
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                ID
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                Citys
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                Country_Id
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                Created_at
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                Updated_at
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                Edit
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                Delete
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-600">
                                        @foreach ( $city as $c )
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4 text-sm text-center text-gray-500 dark:text-white ">
                                                    {{ $c->id }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-center text-gray-900 dark:text-white">
                                                        {{ $c->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500 text-center dark:text-white">
                                                        {{ $c->country->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-white">
                                                    {{ $c->created_at }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-white">
                                                    {{ $c->updated_at }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('edit',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('delet',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                                        Delete
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
</x-dashe-layout>

