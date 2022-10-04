
@props(['title'=>'','discrip'=>'','href'=>'#','icon'=>'','bottomnote'=>''])

<a href="{{ $href }}" class="block">
    <div class="flex px-4 space-x-4">
        <div class="relative flex-shrink-0">
            <span
                class="z-10 inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker">
                <span class="w-7 h-7">{{ $icon }}</span>
            </span>
            <div
                class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker">
            </div>
        </div>
        <div class="flex-1 overflow-hidden">
            <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
               {{$title}}
            </h5>
            <p
                class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
           {{ $discrip }}
            </p>
            <span  dir="rtl" class="text-sm font-normal text-info">
                {{ $bottomnote }}
            </span>
        </div>
    </div>
</a>
