@props(['title' => '', 'route' => ''])
<x-bladewind::modal
    name="delete-item"
    type="warning"
    :title="$title"
    show_action_buttons="false"
    blur_size="none"
>
    Are you sure ?
    <form action="{{$route}}" method="post">
        @csrf
        @method('DELETE')
        <div class="buttons space-x-2 mt-4">
            <x-bladewind::button color="red" can-submit="true">
                Yes
            </x-bladewind::button>
            <x-bladewind::button type="secondary" outline="true" onclick="hideModal('delete-item')">Cancel
            </x-bladewind::button>
        </div>

    </form>
</x-bladewind::modal>
