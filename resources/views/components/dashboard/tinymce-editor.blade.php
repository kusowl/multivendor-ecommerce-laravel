@props(['name'])
<div class="mb-4 flex flex-col gap-y-2">
    <label for="tiny-mce-editor" class="text-gray-500 text-[.95rem] pl-1.5">{{ucfirst($name)}}</label>
    <textarea id="tiny-mce-editor" name="{{$name}}">
    {{$slot}}
    </textarea>
    <x-shared.error field="{{$name}}"/>
</div>
