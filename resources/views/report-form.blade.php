@extends('ex.site')

@section('content')

<div class="flex flex-col p-8 bg-white border shadow-md rounded-xl dark:bg-darker dark:text-white">


    <form action="{{ route('report.store') }}" method="post" class="flex flex-col w-1/2 p-8 mx-auto bg-white border shadow-md rounded-xl dark:bg-darker dark:text-white">

        @csrf
        <input type="hidden" name="reportable_id" value="{{ $reportable_id }}"/>
        <input type="hidden" name="reportable_type" value="{{$reportable_type }}"/>
        <label class="dark:text-white">نوع البلاغ</label>
        <select name="type" id="" class="bg-white rounded-md dark:bg-dark dark:text-light">
            <option value="1" selected>محتوى كاذب </option>
            <option value="2">انتحال شخصية </option>
            <option value="3">محتوى اباحي</option>
            <option value="4">عنفواني وكراهية </option>
        </select>
        <hr>
        <label for=""  class="dark:text-white">ملاحظات اضافية</label>
        <textarea name="note" id="" cols="30" rows="10"  class="bg-white rounded-md dark:bg-dark dark:text-light">
        </textarea>

        <div>
        <button class="flex p-4 mx-auto mt-4 bg-green-600 border rounded-md text-light hover:text-green-600 hover:bg-white border-dark">
            ارسال
            <x-bi-send-fill class="w-12 h-12"/>

        </button>
        </div>



    </form>



</div>

@endsection
