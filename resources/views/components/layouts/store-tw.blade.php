@props(['title' => config('app.name')." - Fashion Store"])
<x-store.header-tw :title="$title"/>
<x-store.navbar/>
<x-store.topbar/>
<div class="mx-auto w-10/12 px-4 py-8">
    <x-toast/>
    {{$slot}}
</div>
<x-store.footer-tw/>
{{-- <x-store.footer/> --}}
