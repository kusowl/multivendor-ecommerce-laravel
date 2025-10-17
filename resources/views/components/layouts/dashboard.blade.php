<x-dashboard.header/>
<div class="flex w-screen h-screen">
    <x-dashboard.sidebar/>
    <div class="p-4 col-span-13 bg-gray-100 w-full">
        {{$slot}}
    </div>
</div>
<x-dashboard.footer/>
