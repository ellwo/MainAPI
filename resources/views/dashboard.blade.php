{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="items-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        You're logged in!
    </div>
</x-app-layout> --}}
<!-- Content header -->
<!-- Content -->

<!-- Main footer -->

<!-- Panels -->


<x-dashe-layout>


    @role('administrator')
        <div>
            <div class="mt-2">
                <!-- State cards -->
                <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">


                    <!-- Orders card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد المنتجات المعروضة
                            </h6>
                            <span class="text-xl font-semibold">45,021</span>
                            <a target="_blank" href="{{ route('admin.manage.products', ['type'=>'all']) }}">
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                ادارة المنتجات
                            </span>
                            </a>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- Value card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد الخدمات المعروضة
                            </h6>
                            <span class="text-xl font-semibold">30,000</span>
                            <a target="_blank" href="{{ route('admin.manage.services', ['type'=>'all']) }}">

                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                ادارة الخدمات
                            </span>
                            </a>

                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Users card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد المستخدمين
                            </h6>
                            <span class="text-xl font-semibold">50,021</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                ادارة المستخدمين
                            </span>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-blue-500 dark:text-primary" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>


                    <!-- Tickets card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد الحسابات التسويقية
                            </h6>
                            <span class="text-xl font-semibold">20,516</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                ادارة الحسابات التسويقية
                            </span>
                        </div>
                        <div>
                            <span class="flex ">
                                <x-bi-shop class="w-12 h-12 text-primary" />

                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد الزيارات</h6>
                            <span class="text-xl font-semibold">20,516</span>

                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                </svg>
                            </span>
                        </div>
                    </div>



                    <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد الاقسام</h6>
                            <span class="text-xl font-semibold">20,516</span>

                        </div>
                        <div>
                            <span>
                                <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد الفئات</h6>
                            <span class="text-xl font-semibold">20,516</span>

                        </div>
                        <div>
                            <span>
                                <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد المدن</h6>
                            <span class="text-xl font-semibold">20,516</span>

                        </div>
                        <div>
                            <span>
                                <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                                عدد الاسواق</h6>
                            <span class="text-xl font-semibold">20,516</span>

                        </div>
                        <div>
                            <span>
                                <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                            </span>
                        </div>
                    </div>

                </div>



                {{-- <!-- Charts -->
                <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                    <!-- Bar chart card -->
                    <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                        <!-- Card header -->
                        <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                                <button class="relative focus:outline-none" x-cloak
                                    @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                                    <div
                                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                                    </div>
                                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                        :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                                    </div>
                                </button>
                            </div>
                        </div>
                        <!-- Chart -->
                        <div class="relative p-4 h-72">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>

                    <!-- Doughnut chart card -->
                    <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                        <!-- Card header -->
                        <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                            <div class="flex items-center">
                                <button class="relative focus:outline-none" x-cloak
                                    @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)">
                                    <div
                                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                                    </div>
                                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                        :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                                    </div>
                                </button>
                            </div>
                        </div>
                        <!-- Chart -->
                        <div class="relative p-4 h-72">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Two grid columns -->
                <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                    <!-- Active users chart -->
                    <div class="col-span-1 bg-white rounded-md dark:bg-darker">
                        <!-- Card header -->
                        <div class="p-4 border-b dark:border-primary">
                            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Active users right
                                now</h4>
                        </div>
                        <p class="p-4">
                            <span class="text-2xl font-medium text-gray-500 dark:text-light"
                                id="usersCount">0</span>
                            <span class="text-sm font-medium text-gray-500 dark:text-primary">Users</span>
                        </p>
                        <!-- Chart -->
                        <div class="relative p-4">
                            <canvas id="activeUsersChart"></canvas>
                        </div>
                    </div>

                    <!-- Line chart card -->
                    <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                        <!-- Card header -->
                        <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Line Chart</h4>
                            <div class="flex items-center">
                                <button class="relative focus:outline-none" x-cloak
                                    @click="isOn = !isOn; $parent.updateLineChart()">
                                    <div
                                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                                    </div>
                                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                        :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                                    </div>
                                </button>
                            </div>
                        </div>
                        <!-- Chart -->
                        <div class="relative p-4 h-72">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
                <ul class="bg-white">
                    <li>
                        <button class="rounded-full bg-primary hover:bg-primary-100 hover:text-dark ">
                            Primary

                        </button>
                    </li>
                    <li>
                        <button class="rounded-full bg-primary-50">
                            Primary 50
                        </button>
                    </li>
                    <li>
                        <button class="rounded-full bg-primary-100">
                            Primary 100
                        </button>
                    </li>
                    <li>
                        <button class="rounded-full bg-primary-light">
                            Primary Light
                        </button>
                    </li>
                    <li>
                        <button class="rounded-full bg-primary-lighter">
                            Primary lighter
                        </button>
                    </li>
                    <li>
                        <button class="rounded-full bg-primary-dark">
                            Primary dark
                        </button>
                    </li>
                    <li>
                        <button class="rounded-full bg-primary-darker">
                            Primary darker
                        </button>
                    </li>
                    <li >
                        <button class="bg-light">
                            light
                        </button>
                    </li>
                    <li>
                        <button class="bg-dark">
                            dark
                        </button>

                    </li>
                    <li>
                        <button class="bg-secondary">
                            secondry
                        </button>

                    </li>

                    <li></li>
                    <li></li>
                </ul> --}}
            </div>


        </div>
    @endrole


    <div dir="rtl" class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-darker">
        مرحبا عزيزنا العميل{{ '  ' . auth()->user()->name }}
    </div>




    <div class="p-6 mt-2 overflow-hidden rounded-md rounded-t-none shadow-md dark:bg-dark" dir="rtl">

        <h1 class="">العمليات المتاحة</h1>
        <!-- State cards -->
        <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">


            <!-- Orders card -->
            <a href="{{ route('product.create', ['username' => 'me']) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                     الرسائل
                    </h6>
                    <span class="text-xs font-semibold">
                        اذهب للماسنجر الخاص بك
                    </span>
                </div>
                <div>


                    <span class="relative">
                        <x-bi-chat-fill class="w-12 h-12 text-blue-400" />

                        <span class="absolute top-0 right-0 bg-white border rounded-full text-danger ">{{ auth()->user()->unreaded_message_count() }}</span>
                    </span>

                </div>
            </a>





            <!-- Orders card -->
            <a href="{{ route('owne-product-orders', ['username' => 'me']) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                       الطلبات المنتجات الواردة
                    </h6>
                    <span class="text-xs font-semibold">

                    </span>

                </div>
                <div>


                    <span class="relative">
                        <x-bi-inbox class="w-12 h-12 text-yellow-700" />
                        <span class="absolute top-0 right-0 bg-white border rounded-full text-danger ">{{ auth()->user()->owne_product_orders()->get()->count() }}</span>

                    </span>

                </div>
            </a>


            <a href="{{ route('owne-service-orders') }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                       طلبات الخدمات الواردة
                    </h6>
                    <span class="text-xs font-semibold">

                    </span>

                </div>
                <div>


                    <span class="relative">
                        <x-bi-inbox class="w-12 h-12 text-yellow-700" />
                        <span class="absolute top-0 right-0 bg-white border rounded-full text-danger ">{{ auth()->user()->owne_service_orders()->get()->count() }}</span>

                    </span>

                </div>
            </a>

            <!-- Orders card -->
            <div
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">

                <div>

                    السلة

                 @livewire('cart.cart-view', key(time()))

                </div>

                <div>

                    المفضلات

                 @livewire('wishlist.wishlist-view', key(time()))

                </div>
            </div>





        </div>
    </div>


    <div class="p-6 mt-2 overflow-hidden rounded-md rounded-t-none shadow-md dark:bg-dark" dir="rtl">

        <h1 class="">العمليات المتاحة</h1>
        <!-- State cards -->
        <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-3">


            <!-- Orders card -->
            <a href="{{ route('product.create', ['username' => 'me']) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        اضافة منتج جديد
                    </h6>
                    <span class="text-xs font-semibold">
                        يمكنك اضافة منتجات بعدد غير محدود

                    </span>

                </div>
                <div>


                    <span>
                        <x-heroicon-o-plus class="w-12 h-12 text-success" />
                    </span>

                </div>
            </a>
            <!-- Orders card -->
            <a href="{{ route('service.create', ['username' => 'me']) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        اضافة خدمة جديدة
                    </h6>
                    <span class="text-xs font-semibold">
                        يمكنك اضافة خدمات بعدد غير محدود

                    </span>

                </div>
                <div>


                    <span>
                        <x-heroicon-o-plus class="w-12 h-12 text-success" />
                    </span>

                </div>
            </a>

            <!-- Orders card -->
            <a href="{{ route('b.create') }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        انشاء حساب تسويقي تجاري/خدمي جديد
                    </h6>
                    <span class="text-xs font-semibold">
                        انشئ متجرك /مكتب الخدمة الخاص بك الان
                    </span>

                </div>
                <div>


                    <span>
                        <x-bi-shop class="w-12 h-12 text-m_primary" />
                        <span class="mx-2 my-2 text-sm font-bold bg-white border rounded text-success">مجانا</span>
                    </span>

                </div>
            </a>





        </div>
    </div>















    <x-slot name="script">
        <script>
            const random = (max = 100) => {
                return Math.round(Math.random() * max) + 20
            }



            const randomData = () => {
                return [
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                    random(),
                ]
            }

            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

            const cssColors = (color) => {
                return getComputedStyle(document.documentElement).getPropertyValue(color)
            }

            const getColor = () => {
                return window.localStorage.getItem('color') ? window.localStorage.getItem('color') : 'cyan';
            }

            const colors = {
                primary: cssColors(`--color-${getColor()}`),
                primaryLight: cssColors(`--color-${getColor()}-light`),
                primaryLighter: cssColors(`--color-${getColor()}-lighter`),
                primaryDark: cssColors(`--color-${getColor()}-dark`),
                primaryDarker: cssColors(`--color-${getColor()}-darker`),
            }

            const barChart = new Chart(document.getElementById('barChart'), {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        data: randomData(),
                        backgroundColor: colors.primary,
                        hoverBackgroundColor: colors.primaryDark,
                    }, ],
                },
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: false,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 50,
                                fontSize: 12,
                                fontColor: '#97a4af',
                                fontFamily: 'Open Sans, sans-serif',
                                padding: 10,
                            },
                        }, ],
                        xAxes: [{
                            gridLines: false,
                            ticks: {
                                fontSize: 12,
                                fontColor: '#97a4af',
                                fontFamily: 'Open Sans, sans-serif',
                                padding: 5,
                            },
                            categoryPercentage: 0.5,
                            maxBarThickness: '10',
                        }, ],
                    },
                    cornerRadius: 2,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                },
            })

            const doughnutChart = new Chart(document.getElementById('doughnutChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Oct', 'Nov', 'Dec'],
                    datasets: [{
                        data: [random(), random(), random()],
                        backgroundColor: [colors.primary, colors.primaryLighter, colors.primaryLight],
                        hoverBackgroundColor: colors.primaryDark,
                        borderWidth: 0,
                        weight: 0.5,
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                    },

                    title: {
                        display: false,
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                    },
                },
            })

            const activeUsersChart = new Chart(document.getElementById('activeUsersChart'), {
                type: 'bar',
                data: {
                    labels: [...randomData(), ...randomData()],
                    datasets: [{
                        data: [...randomData(), ...randomData()],
                        backgroundColor: colors.primary,
                        borderWidth: 0,
                        categoryPercentage: 1,
                    }, ],
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: false,
                            gridLines: false,
                        }, ],
                        xAxes: [{
                            display: false,
                            gridLines: false,
                        }, ],
                        ticks: {
                            padding: 10,
                        },
                    },
                    cornerRadius: 2,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        prefix: 'Users',
                        bodySpacing: 4,
                        footerSpacing: 4,
                        hasIndicator: true,
                        mode: 'index',
                        intersect: true,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true,
                    },
                },
            })

            const lineChart = new Chart(document.getElementById('lineChart'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        data: randomData(),
                        fill: false,
                        borderColor: colors.primary,
                        borderWidth: 2,
                        pointRadius: 0,
                        pointHoverRadius: 0,
                    }, ],
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            gridLines: false,
                            ticks: {
                                beginAtZero: false,
                                stepSize: 50,
                                fontSize: 12,
                                fontColor: '#97a4af',
                                fontFamily: 'Open Sans, sans-serif',
                                padding: 20,
                            },
                        }, ],
                        xAxes: [{
                            gridLines: false,
                        }, ],
                    },
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        hasIndicator: true,
                        intersect: false,
                    },
                },
            })

            let randomUserCount = 0

            const usersCount = document.getElementById('usersCount')

            const fakeUsersCount = () => {
                randomUserCount = random()
                activeUsersChart.data.datasets[0].data.push(randomUserCount)
                activeUsersChart.data.datasets[0].data.splice(0, 1)
                activeUsersChart.update()
                usersCount.innerText = randomUserCount

            }

            setInterval(() => {
                fakeUsersCount()
            }, 1000)
        </script>

    </x-slot>
</x-dashe-layout>
