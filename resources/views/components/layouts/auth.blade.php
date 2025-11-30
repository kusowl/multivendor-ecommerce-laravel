@props(['title'])
<x-store.header-tw :title="$title"/>
{{ $slot }}
<x-store.footer/>
