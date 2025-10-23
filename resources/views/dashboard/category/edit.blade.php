@php
    $selected_images = [];
        if($category->image && $category->image != null){
        $selected_images[] = [
            'source' => \App\Utils\File::getImage($category->image)
        ];
        }

@endphp
<x-layouts.dashboard-form>
    <form action="{{route('dashboard.category.update', $category->slug)}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <x-bladewind::input
            name="name"
            required="true"
            label="Category name"
            :value="$category->name"
        />
        <x-error field="name"/>
        <x-bladewind::filepicker
            name="image"
            show_image_preview="true"
            accepted-file-types="image/*"
            max_file_size="{{config('file.max_image_size')}}mb"
            :selected-value="$selected_images"
        />
        <x-error field="image"/>

        <x-bladewind::button can-submit="true" color="yellow">Update</x-bladewind::button>
    </form>

</x-layouts.dashboard-form>
