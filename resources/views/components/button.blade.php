@props(['icon' => ''])
<button {{ $attributes->merge(['class' => 'btn btn-soft']) }} >
    <i data-lucide="{{$icon}}"></i>
    <span class="hidden loading loading-spinner"></span>
    {{$slot}}
</button>
