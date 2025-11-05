<x-layouts.dashboard-form>
    <form action="{{route('dashboard.sub-category.create')}}" method="post">
        @csrf
        <x-bladewind::input
            name="name"
            required="true"
            label="Sub-Category name"
        />
        <x-dashboard.error field="name"/>

        <x-bladewind::select
            name="category_id" label="Select parent category"
            required="true" :data="$categories"
            label_key="name" value_key="id"
            :selected_value="old('category_id')"
        />
        <x-dashboard.error field="category_id"/>
        <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
    </form>
</x-layouts.dashboard-form>
