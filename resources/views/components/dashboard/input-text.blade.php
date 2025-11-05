@props(['name'])
<div class="flex flex-col w-full">
    <x-bladewind::input name="{{$name}}" :selected-value="old($name)" {{$attributes}}/>
    <x-error field="{{$name}}"/>

</div>
