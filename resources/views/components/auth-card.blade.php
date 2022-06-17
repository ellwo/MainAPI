<div
{{ $attributes->merge(['class' =>'flex bg-base-100 flex-col items-center flex-1 px-4 pt-6 sm:justify-center'])}}>
    <div>
        <a href="/">
            <x-application-logo class="w-40 h-40" />
        </a>
    </div>

    <div class="   text-base-300  w-full px-6 py-4 my-6 overflow-hidden bg-white rounded-md shadow-md sm:max-w-md dark:bg-dark-eval-1">
        {{ $slot }}
    </div>
</div>

