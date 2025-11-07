@props(['name'])
<div class="flex flex-col w-full">
    <x-bladewind::input name="{{$name}}" :selected-value="old($name)" {{$attributes}}/>
    <x-shared.error field="{{$name}}"/>

</div>
