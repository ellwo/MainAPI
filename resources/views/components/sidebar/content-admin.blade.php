
<h2>
    مرحبا ايه الادمن
</h2>

<hr>

<x-sidebar.link title="ادارة  المدن" href="{{ route('show_city') }}" :isActive="request()->routeIs('show_city')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الاسواق" href="{{ route('show_markts') }}" :isActive="request()->routeIs('show_markts')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الاقسام" href="{{ route('show_Department') }}" :isActive="request()->routeIs('show_Department')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الفئات" href="{{ route('show_Parts') }}" :isActive="request()->routeIs('show_Parts')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة  الاعلانات" href="{{ route('ad') }}" :isActive="request()->routeIs('ad')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة خدماتي المعروضة" href="{{ route('mange.services',['type'=>'all']) }}" :isActive="request()->routeIs('mange.services')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>
<hr>
