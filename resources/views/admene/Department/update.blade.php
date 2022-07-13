<x-dashe-layout>
                <div class="border-2 rounded-lg px-8 py-4 mx-16 my-16 border-blue-900 shadow-sm">
                    <form class="text-right" action="{{route('update_Department',['id'=>$department->id])}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم القسم</label>
                            <input value="{{ $department->name }}" name="name" type="text" id="city" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="المدينة" required>
                          </div>
                          <div class="mb-6">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">النوع</label>
                            {{-- <input type="text" id="password" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required> --}}
                            <select id="type"  name="type" class=" dark:text-white dark:bg-gray-700 w-full text-right">
                                    <option @if ($department->type==1)
                                        selected
                                    @endif value="1">تجاري</option>
                                    <option @if ($department->type==2)
                                        selected
                                        @endif  value="2">خدمي</option>
                            </select>
                          </div>
                          <div class="mb-6">
                              <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Image Src</label>
                            <div id="image">

                            </div>
                            </div>
                            <div class="mb-6">
                              <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الملاحظة</label>
                              <input value="{{ $department->note }}" name="note" type="text" id="note" class="text-right shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light transition-all" placeholder="المدينة" required>
                            </div>
                        <input type="submit" class="transition-all w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      </form>
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
                     src:"{{ $department->img }}"
        });
        </script>
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });



    </x-slot>

</x-dashe-layout>

