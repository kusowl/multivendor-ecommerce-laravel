@props(['icon' => ''])
<button {{ $attributes->merge(['class' => 'btn btn-soft']) }} >
    @if($icon != '')
        <i data-lucide="{{$icon}}"></i>
    @endif
    <span class="hidden loading loading-spinner"></span>
    {{$slot}}
</button>
