@props(['title' => config('app.name')." - Fashion Store"])
<x-store.header :title="$title"/>
<x-store.topbar/>
<x-store.navbar/>
{{$slot}}
<x-store.footer/>
