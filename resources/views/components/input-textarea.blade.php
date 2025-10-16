@props(['name'])

<x-bladewind::textarea name="{{$name}}" :selected-value="old($name)" {{$attributes}}/>
<x-error field="{{$name}}"/>
