<x-layouts.dashboard>
    <form action="{{route('dashboard.category')}}" method="post">
        @csrf
        <x-bladewind::input
            name="name"
            required="true"
            label="Category name"
        />
        <x-error field="name" />
        <x-bladewind::input
            name="slug"
            label="Slug"
            required="true"
        />
        <x-error field="slug" />

        <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
    </form>
</x-layouts.dashboard>
