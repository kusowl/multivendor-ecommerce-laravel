@props(['title'])
<x-store.header :title="$title"/>
{{ $slot }}
<x-store.footer/>
