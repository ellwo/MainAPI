<x-dashe-layout>

    <div class="h-screen space-x-4 pt-8 lg:flex  text-xs " dir="rtl">
    <div class="lg:w-1/3 px-2 py-2 mx-auto border-2 border-blue-900 rounded-lg shadow-sm ">
        <form class="text-right" action="{{route('save_Department')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
              <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم القسم</label>
              <input name="name" type="text" id="city" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="اسم القسم" required>
              @error("name")
                  <span class="rounded-md text-danger" >{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-2">
              <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">النوع</label>
              {{-- <input type="text" id="password" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required> --}}
              <select id="type"  name="type" class="w-full text-right dark:text-white dark:bg-gray-700">
                      <option value="1">تجاري</option>
                      <option value="2">خدمي</option>
              </select>
            </div>
            <div class="mb-2">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">صورة القسم</label>
           <div id="image"></div>
            </div>
              <div class="mb-2">

                <div class="w-full form-item" >
                    <label class="text-xl ">الوصف</label>
            <textarea cols="30" rows="8"
            name="note" maxlength="191"
             class="w-full px-2 py-1 mr-2 text-black text-opacity-50 rounded shadow appearance-none dark:bg-primary-darker dark:text-light focus:outline-none focus:shadow-outline focus:border-primary" ></textarea>
                  </div>
                @error("note")
                    <span class="rounded-md text-danger" >{{ $message }}</span>
                @enderror
              </div>
            <input type="submit" class="transition-all w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          </form>
    </div>



    <div class="flex justify-center lg:w-2/3 mx-auto h-3/4">

<div x-data="perfectScroll" id="messages_view" class="relative h-full " @mousemove="update">

    @livewire('admin.department-table', key(time()))

    </div>
    </div>
    </div>


    <x-slot name="script">

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/uploadeimage.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

        <script>
             newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"image",
                    w:850,h:850,
                     src:"no"
        });
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });


        </script>


    </x-slot>

</x-dashe-layout>
