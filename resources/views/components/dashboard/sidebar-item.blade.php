@props(['icon', 'route' => ''])

@php
    $url = $route == '' ? '#' : route($route);
@endphp

<li>
    @if(request()->routeIs($route))
        <a href="{{ $url }}"
           class=" transition duration-300 ease-in-out flex gap-x-2 items-center py-2 px-4 rounded-lg hover:bg-blue-100 !text-blue-600 bg-blue-50  border  !border-l-blue-500 !border-l-4  !border-blue-500 font-medium">
            <x-bladewind::icon :name="$icon" class="h-5"/>
            {{ $slot }}
        </a>
    @else
        <a href="{{ $url }}"
           class="transition duration-300 ease-in-out flex gap-x-2 items-center py-2 px-4 rounded-lg hover:bg-gray-100 !text-gray-600 font-medium">
            <x-bladewind::icon :name="$icon" class="h-5"/>
            {{ $slot }}
        </a>
    @endif
</li>
