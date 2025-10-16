<x-layouts.dashboard>
    <x-bladewind::card class="max-w-xl">
        <form action="{{route('dashboard.product')}}" method="post">
            @csrf
            <x-input-text name="name" required="true" label="Product name"/>

            <x-input-text name="slug" label="Slug" required="true"/>

            <x-input-text name="price" label="Price" required="true"/>

            <x-input-text name="stock" label="Stock" required="true"/>

            <x-input-textarea name="description" label="Description" required="true" />

            <x-bladewind::select
                name="category_id" label="select category"
                required="true" :data="$categories"
                label_key="name" value_key="id"
                :selected_value="old('category_id')"
            />
            <x-error field="category_id" />

            <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
        </form>
    </x-bladewind::card>

</x-layouts.dashboard>
