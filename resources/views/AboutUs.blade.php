@extends('ex.site')
@section('content')
<!-- component -->
<div class="py-16 bg-white " >
    <div class="container flex px-6 m-auto text-gray-600 md:px-12 xl:px-6 "  >
        <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
          <div class="md:5/12 lg:w-5/12">
            <img src="https://tailus.io/sources/blocks/left-image/preview/images/startup.png" alt="image" loading="lazy" width="" height="">
          </div>
          <div class="md:7/12 lg:w-6/12">
            <h2 class="text-6xl font-bold text-red-800 " style="color: #f35107">منصه التسويق الالكتروني للمنتجات والخدمات</h2>
            <br>
            <p class="mt-6 text-4xl text-gray-600">تقدم المنصه خدمه التسويق الالكتروني و امكانيه عرض وتسويق المنتجات والخدمات بشكل مجاني مع امكانيات كثيره ووميزه </p>
            <p class="mt-4 text-4xl text-gray-600">توفير القدرة على البيع والشراء سواء للأفراد أو المحلات التجارية وتسهيل وخفض تكاليف البيع والوصول الى اكبر عدد من العملاء وتوسيع المجال الجغرافي لعمليات البيع والشراء.</p>
          </div>
        </div>




    </div><br><br><br>


    <div class="text-center">
        <h1 class="text-6xl font-bold" style="color: #f35107">أهدافنا</h1>
        <br>
        <p class="text-4xl ">  تغيير طريقة البيع والشراء التقليدية المكلفة في اليمن الى طريقة بيع وشراء الكترونية سهلة وعملية لتواكب التطور التجاري في العالم.</p>
    </div>
    <br><br><br><br>


    <div class="text-center">
        <h1 class="text-6xl font-bold" style="color: #f35107">رؤيتنا</h1>
        <br>
        <p class="text-4xl "> توفير القدرة على البيع والشراء سواء للأفراد أو المحلات التجارية وتسهيل وخفض تكاليف البيع والوصول الى اكبر عدد من العملاء وتوسيع المجال الجغرافي لعمليات البيع والشراء.</p>
    </div>
    <br><br><br><br>


    <div class="text-center">
        <h1 class="text-6xl font-bold" style="color: #f35107">مميزاتنا</h1>
        <br>
        <p class="text-4xl ">نحن نقدم موقع تسويق الكتروني ونتميز بالتالي :</p>
    </div>

        </div>



    <!-- component -->
    <div class="px-3 py-20 border-b xl:lg:md:px-40 bg-opacity-10" style="background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png') ;">
        <div class="grid grid-cols-1 text-6xl bg-white border shadow-xl xl:lg:md:grid-cols-3 group shadow-neutral-100 ">


            <div
                class="flex flex-col items-center p-10 text-center cursor-pointer group hover:bg-slate-50">
                <span class="p-5 text-white bg-red-500 rounded-full shadow-lg shadow-red-200">
                    <x-bi-shop class="w-10 h-10"/>
                </span>
                    <br>
                <p class="mt-3 text-4xl font-medium text-slate-700">محلات واسواق الكترونيه</p>
                <p class="mt-2 text-3xl text-slate-500">للبائعين لإدارة وعرض وبيع منتجاتهم والإعلان والترويج لها للمتسوقين والعملاء. </p>
            </div>

            <div
                class="flex flex-col items-center p-10 text-center cursor-pointer group hover:bg-slate-50">
                <span class="p-5 text-white rounded-full shadow-lg bg-primary_color border-warning-darker shadow-orange-200">
                    <x-bi-bag class="w-10 h-10"/>
                </span>
                    <br>
                <p class="mt-3 text-4xl font-medium text-slate-700">سوق الكتروني</p>

                <p class="mt-2 text-3xl text-slate-500">للمتسوقين والعملاء للتسوق عبر الإنترنت وشراء المنتجات المعروضة في السوق من قبل البائعين. أيضاً إكتشاف العروض، والتخفيضات، وكتالوج المنتجات.</p>
            </div>

            <div class="flex flex-col items-center p-10 text-center cursor-pointer group hover:bg-slate-50">
                <span class="p-5 text-white bg-yellow-500 rounded-full shadow-lg shadow-yellow-200">
                    <x-bi-chat class="w-10 h-10"/>
                </span>
                    <br>
                <p class="mt-3 text-4xl font-medium text-slate-700">التواصل المباشر </p>
                <p class="mt-2 text-3xl text-slate-500">بين البائعين والمشتريين مع امكانيه حظر الحسابات الوهميه والمزعجه </p>
            </div>


            <div class="flex flex-col items-center p-10 text-center cursor-pointer group hover:bg-slate-50">
                <span class="p-5 text-white bg-green-600 rounded-full shadow-lg bg-lime-500 shadow-lime-200">
                    <x-heroicon-o-user-group class="w-10 h-10"/>
                </span>
                    <br>
                <p class="mt-3 text-4xl font-medium text-slate-700">امكانية انشاء حسابات تسويقيه وخدمية متعدده</p>
                <p class="mt-2 text-3xl text-slate-500">بامكان اصحاب المحلات التجاريه انشاء اكثر من حساب تسويقي او خدمي بشكل مجاني </p>
            </div>

            <div class="flex flex-col items-center p-10 text-center cursor-pointer group hover:bg-slate-50">
                <span class="p-5 text-white bg-red-800 bg-teal-500 rounded-full shadow-lg shadow-teal-200">
                    <x-bi-search  class="w-10 h-10"/>
                </span>
                    <br>
                <p class="mt-3 text-4xl font-medium text-slate-700">سرعة البحث والفلتره</p>
                <p class="mt-2 text-3xl text-slate-500">داخل الموقع حيث يستطيع العميل الوصول للمنتج او الخدمه بطريقه سريعة وسلسه دون عناء او تعب</p>
            </div>

            <div class="flex flex-col items-center p-10 text-center cursor-pointer group hover:bg-slate-50">
                <span class="p-5 text-white bg-indigo-500 rounded-full shadow-lg shadow-indigo-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg></span>
                    <br>
                <p class="mt-3 text-4xl font-medium text-slate-700">مركز الدعم والمساعدة</p>
                <p class="mt-2 text-3xl text-slate-500">الذي يوفر لك كل الدعم الذي تحتاجه
                </p>
            </div>




        </div>
    </div>



@endsection
