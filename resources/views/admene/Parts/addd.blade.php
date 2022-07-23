<x-dashe-layout>
    <div>
    <div>
    <h1 dir="rtl" class="flex  w-1/3 mx-auto p-4 mb-4 bg-white shadow-md rounded-xl dark:bg-darker dark:text-white ">
       ادارة الفئات
        <x-heroicon-s-view-grid class="w-16 h-16 text-yellow-400"/>
    </h1>
</div>
    <div class="flex space-x-4 p-4 mb-4 bg-white shadow-md rounded-xl dark:bg-darker dark:text-white">

@livewire('admin.part-table', key(time()))


                <div class="border-2 md:w-1/3 rounded-lg px-8 py-4 mx-16 my-16 border-blue-900 shadow-sm">
                    <form class="text-right" action="{{route('save_Parts')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الاسم</label>
                          <input name="name" type="text" id="name" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="الاسم" required>
                          @error("name")
                              <span class="text-danger rounded-md" >{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="mb-6">
                            <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">وصف الفئة</label>
                            <textarea name="note"  id="note" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="Note" required>
                            </textarea>
                            @error("note")
                                <span class="text-danger rounded-md" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6">
                          <label for="department_id " class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">القسم</label>
                          {{-- <input department_id ="text" id="password" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required> --}}
                          <select id="department_id "  name="department_id" class=" dark:text-white dark:bg-gray-700 w-full text-right">
                                  @foreach ($d as $c)
                                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                                  @endforeach
                          </select>
                        </div>
                        <input type="submit" class="transition-all w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      </form>
                </div>


</div>
    </div>
</x-dashe-layout>
