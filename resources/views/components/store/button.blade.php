<button {{ $attributes->merge(['class' => 'btn btn-main mt-20']) }} >
    <span class="button-text">{{ $slot }}</span>
    <span class="loading loading-spinner loading-xs hidden"></span>
</button>
<script type="text/javascript">
    const showSpinner = () => {
        console.log('spinner . o 0')
    }
</script>
