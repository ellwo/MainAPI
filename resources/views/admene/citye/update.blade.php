
<x-dashe-layout>
                <div class="border-2 rounded-lg px-8 py-4 mx-16 my-16 border-blue-900 shadow-sm">
                    <form class="text-right" action="{{route('update',['id'=>$city->id])}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                          <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم المدية</label>
                          <input value="{{ $city->name }}" name="name" type="text" id="city" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="المدينة" required>
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
</x-dashe-layout>
