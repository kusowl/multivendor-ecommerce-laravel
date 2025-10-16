@props(['name'])

<x-bladewind::input name="{{$name}}" :selected-value="old($name)" {{$attributes}}/>
<x-error field="{{$name}}"/>
