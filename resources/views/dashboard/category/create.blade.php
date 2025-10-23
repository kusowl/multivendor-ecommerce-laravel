<x-layouts.dashboard-form>

    <form action="{{route('dashboard.category.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-bladewind::input
            name="name"
            required="true"
            label="Category name"
        />
        <x-error field="name"/>
        <x-bladewind::filepicker
            name="image"
            show_image_preview="true"
            accepted-file-types="image/*"
            max_file_size="{{config('file.max_image_size')}}mb"
        />
        <x-error field="image"/>

        <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
    </form>

</x-layouts.dashboard-form>
