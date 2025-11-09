@props(['title' => config('app.name')." - Fashion Store"])
<x-store.header-tw :title="$title"/>
{{-- <x-store.topbar/> --}}
{{-- <x-store.navbar/> --}}
<div class="mx-auto w-10/12">
    {{$slot}}
</div>
{{-- <x-store.footer/> --}}
