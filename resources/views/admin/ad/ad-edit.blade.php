<x-dashe-layout>


    <div class="max-w-4xl flex flex-col mx-auto  bg-white border rounded-lg dark:bg-dark ">
        <div class="text-center text-darker dark:text-light">
            <h1>تعديل اعلان </h1>
        </div>
        <hr>
        <form  dir="auto" method="POST" action="{{ route('ad.update',$ad) }}" class="mx-auto flex flex-col w-3/4  space-x-2 space-y-3  dark:bg-dark">

            @method('PUT')
            @csrf
            <x-label :value="__('صورة الاعلان ')" />

            <div class="rounded-xl
            @error('img')
            border-danger
            @enderror border text-center">
            <div id="img">
            </div>

            @error('img')
            <span class="text-danger text-sm">{{ $message }}</span>

            @enderror
            </div>
            <hr>
            <x-label :value="__('وصف الاعلان ')"/>
            <textarea name="note" class="rounded-md
            @error('note')
          border-danger
            @enderror text-darker p-2 dark:bg-dark dark:text-light" rows="2" >{{ $ad->note}}</textarea>

            @error('note')
            <span class="text-danger text-sm">{{ $message }}</span>

            @enderror
            <hr>
            <x-label :value="__('رابط الاعلان' )"/>
            <input dir="ltr" type="text" name="link" value="{{$ad->link}}" class="rounded-md p-2 text-dark dark:bg-darker dark:text-light border-t-0 border-l-0
            @error('link')
             border-danger
            @enderror border-r-0 focus:border-info "/>

            @error('link')
            <span class="text-danger text-sm">{{ $message }}</span>

            @enderror


            <div class="text-center">
            <x-button variant="success" type="submit" >
                حفظ
            </x-button>
            </div>

        </form>

    </div>

    <x-slot name="script">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/uploadeimage.js') }}"></script>
        <script>

            var img=new ImagetoServer({
                url:"{{ route('uploade') }}",
                src:"{{ $ad->img}}",
                id:'img',
                h:400,
                w:712,
                with_w_h:true,
                shep:'rect',


            });



        </script>




    </x-slot>








</x-dashe-layout>
