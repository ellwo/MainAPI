@extends('ex.site')


@section('content')

<style>
body { padding: 2rem 0; }

</style>
<!-- @if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
{{$error}}
</div>


@endforeach

@endif -->

<div class="flex flex-col items-center justify-center max-w-4xl mx-auto dark:bg-dark">
<div class="w-full mx-auto " >
  <div class="h-auto p-6 text-right border border-gray-300 sm:rounded-md" style="width: 100%;  font-size: larger;font-family:none; color:black;"  >
    <form method="POST" class="w-full h-auto " action="{{route('post.create_contact')}}" >
    @csrf
      <h1 class="text-center bg-m_primary">تواصل معنا</h1>
      <label class="block mb-6">
        <span class="text-black" style="font-size: larger;font-family:none;">اسمك</span>
        <input
          type="text"
          name="name"
          class="block w-full h-12 mt-1 text-xl text-black border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          placeholder="Joe Bloggs"
          required
        />
      </label>
      <label class="block mb-6">
        <span class="text-black" style="font-size: larger;font-family:none;">بريدك الالكتروني </span>
        <input
          name="email"
          type="email"
          class="block w-full mt-1 text-xl border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          placeholder="exampl@example.com"
          required
        />
      </label>
      <label class="block mb-6">
        <span class="text-black" style="font-family:none;">نص الرسالة</span>
        <textarea
          name="message"
          class="block w-full mt-1 text-xl text-black border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          rows="3"
          placeholder="Tell us what you're thinking about..."
        ></textarea>
      </label>

      <div class="max-w-lg mx-auto">

        <fieldset class="mb-5">

            <p class="text-2xl">النوع</p>




            <div class="flex items-center mb-4 ">
                <input id="country-option-1" type="radio" name="kind" value="1" {{old('kind')=='1' ? 'checked ' : ''}} checked class="w-4 h-4 text-right border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="country-option-4" aria-describedby="country-option-4">
                <label for="country-option-1" class="block ml-2 text-2xl font-medium text-right text-gray-900 border-r-4">
               استفسار
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="country-option-4" type="radio" name="kind" value="2" {{old('kind')=='2' ? 'checked ' : ''}} class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="country-option-4" aria-describedby="country-option-4">
                <label for="country-option-4" class="block ml-2 text-2xl font-medium text-gray-900">
                    شكوئ
                </label>
            </div>


        </fieldset>

    </div>




      <div class="mb-6 text-center ">
        <button
          type="submit"
          class="h-12 px-5 text-center text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg max-h-20 focus:shadow-outline hover:bg-indigo-800"
        >
          ارسال
        </button>
      </div>

    </form>
  </div>
</div>

</div>
@endsection
