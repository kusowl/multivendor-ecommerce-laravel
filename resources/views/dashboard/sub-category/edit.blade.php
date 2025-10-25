<x-layouts.dashboard-form>
    <form action="{{route('dashboard.sub-category.update', $subCategory->slug)}}" method="post">
        @csrf
        @method('PATCH')
        <x-bladewind::input
            name="name"
            required="true"
            label="Sub-Category name"
            :value="$subCategory->name"
        />
        <x-error field="name"/>

        <x-bladewind::select
            name="category_id" label="Select parent category"
            required="true" :data="$categories"
            label_key="name" value_key="id"
            :selected_value="$subCategory->category->id"
        />
        <x-error field="category_id"/>
        <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
    </form>
</x-layouts.dashboard-form>
