<x-dashe-layout>
    <style>
        body { padding: 2rem 0; }

        </style>


    <div class="items-center text-center">
        <div class="w-full h-auto mx-auto md:w-96 md:max-w-full  " >
          <div class="h-auto p-6 border border-gray-300 sm:rounded-md text-right" style="width: 150%;  font-size: larger;font-family:none; color:black;"  >
            <form method="POST" class="w-full h-auto " action="{{route ('post.update_con')}}" >
            @csrf
            <input type="hidden" name="mes" value="{{$mes->id}}">
              <h1 class="text-center bg-m_primary"> الرد علئ الاستفسارات والشكاوي </h1>
              <label class="block mb-6">
                <span class="text-black" style="font-size: larger;font-family:none;">الاسم</span>
                <p>
                    {{$mes->name}}

                </p>

                <label class="block mb-6">
                    <span class="text-black" style="font-size: larger;font-family:none;">البريد</span>
                    <p>
                        {{$mes->email}}

                    </p>

                    <label class="block mb-6">
                        <span class="text-black" style="font-size: larger;font-family:none;">الرساله</span>
                        <p>
                            {{$mes->message}}

                        </p>




              <label class="block mb-6">
                <span class="text-black" style="font-size: larger;font-family:none;">رد</span>
                <input
                  type="text"
                  name="massege_replay"
                  class="block w-full mt-1 font-bold text-black text-center border-gray-300 rounded-md shadow-sm h-28 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  placeholder="كتابة رد"
                  required
                />
              </label>

              <div class="mb-6 text-center ">
                <button
                  type="submit"
                  class="px-5 text-center text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg h-12 max-h-20 focus:shadow-outline hover:bg-indigo-800"
                >
                  ارسال الرد
                </button>
              </div>
            </form>
          </div>
        </div>




</x-dashe-layout>
