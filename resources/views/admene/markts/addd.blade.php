<x-dashe-layout>

    <div class="mx-auto lg:flex lg:space-x-4" dir="rtl">
                        <div class="w-3/4 p-8 mx-auto my-8 border-2 border-blue-900 rounded-lg shadow-sm lg:w-1/3 lg:p-2 lg:mx-4 ">
                    <form class="flex-col text-right"  dir="auto" action="{{route('save_markts')}}" method="POST"  >
                        @csrf
                        <div class="flex flex-col w-full mb-6 ">
                        <div class="mx-2 mb-6 space-x-2 ">
                            <label for="city" class="block mx-2 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم السوق </label>
                            <input name="name" type="text" id="city" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="الاسم" required>
                          @error("name")
                              <span class="rounded-md text-danger" >{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="mb-6 space-x-2 ">
                          <label for="city_id" class="block mx-2 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">المدينة</label>
                          {{-- <input city_id="text" id="password" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required> --}}
                          <select id="city_id"  name="city_id" class="w-full text-right rounded-md appearance-none dark:text-white dark:bg-gray-700">
                                  @foreach ($city as $c)
                                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                                  @endforeach
                          </select>
                        </div>
                        </div>
                        {{-- <div class="mb-6">
                            <label for="land" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Land Map</label>
                            <input name="land" type="text" id="land" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="Land Map " required>
                            @error("land")
                                <span class="rounded-md text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="mb-6">
                            <label for="long" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Long Map</label>
                            <input name="long" type="text" id="long" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="Long Map" required>
                            @error("long")
                                <span class="rounded-md text-danger" >{{ $message }}</span>
                            @enderror
                          </div> --}}
                        <button type="submit" class="transition-all flex mx-auto text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        حفظ
                        <x-heroicon-s-save class="w-5 h-5"/>
                        </button>
                      </form>
                </div>



                @livewire('admin.market-table', key(time()))
            </div>

</x-dashe-layout>
