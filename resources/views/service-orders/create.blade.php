@extends('ex.site')


@section('content')

<div class="w-full mx-auto bg-white sm:w-3/4 dark:bg-darker rounded-xl ">

    <form  action="{{ route('serviceorder.store') }}" method="POST" class="flex flex-col p-8 space-x-6 space-y-4">
        @csrf

        <div><h1>حجز خدمة</h1></div>
        <hr>

        <h4>المنتج</h4>
        <div class="flex space-x-4 space-y-2 border rounded-md">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="m-4">
                <img src="{{ $product->img }}" class="h-40 rounded-xl"/>
            </div>
            <div class="text-darker dark:text-white">
            <span>اسم الخدمة</span>
                <h3>{{ $product->name }}</h3>
                <hr>
                <span>السعر</span>
                <h5>{{ $product->price."/ر.ي" }}</h5>
                </div>
        </div>

        <div class="flex">
            <div class="product-quantity">
                <span class="control-label">عدد الايام : </span>
                <div class="qty">
                    <div class="input-group bootstrap-touchspin"><span
                            class="input-group-addon bootstrap-touchspin-prefix"
                            style="display: none;"></span><input type="text"
                            name="qty" id="quantity_wanted" value="1"
                            class="input-group form-control" min="1"
                            style="display: block;"><span
                            class="input-group-addon bootstrap-touchspin-postfix"
                            style="display: none;"></span><span
                            class="input-group-btn-vertical"><button
                                class="btn btn-touchspin js-touchspin bootstrap-touchspin-up"
                                type="button"><i
                                    class="material-icons touchspin-up"></i></button><button
                                class="btn btn-touchspin js-touchspin bootstrap-touchspin-down"
                                type="button"><i
                                    class="material-icons touchspin-down"></i></button></span>
                    </div>
                </div>
            </div>


        </div>

        <div class="flex flex-col space-x-2">
            <x-label value="التارخ المراد الحجز فيه" />
            <input type="date" class="w-3/4 p-4 mx-2 text-2xl rounded-md dark:bg-darker" name="to_date" id="" />
        </div>

        <div class="flex flex-col space-x-2">
            <x-label value="العنوان" />
            <input type="text" class="w-3/4 p-4 mx-2 text-2xl rounded-md dark:bg-darker" name="address" id="" />
        </div>
        <div class="flex flex-col space-x-2">
            <x-label value="الملاحظات" />
        <textarea rows="4" name="note" class="w-3/4 mx-2 text-2xl rounded-md dark:bg-darker">
        </textarea>
        </div>

        <div class="mx-auto">
            <button class="flex p-2 text-white bg-green-600 rounded-md">
                ارسال الطلب
                <x-bi-save class="w-8 h-8"/>

            </button>
        </div>




    </form>


</div>


@endsection
