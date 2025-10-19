<x-layouts.dashboard-form>
    <x-bladewind::card class="mb-4 ">
        <form action="{{route('dashboard.product')}}" method="post">
            @csrf
            <x-input-text name="name" required="true" label="Product name"/>

            <x-input-text name="slug" label="Slug" required="true"/>

            <x-input-text name="price" label="Price" required="true"/>

            <x-input-text name="stock" label="Stock" required="true"/>

            <x-input-textarea name="description" label="Description" required="true"/>

            <x-bladewind::select
                name="category_id" label="select category"
                required="true" :data="$categories"
                label_key="name" value_key="id"
                :selected_value="old('category_id')"
            />
            <x-error field="category_id"/>

            <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
        </form>
    </x-bladewind::card>
    <x-bladewind::table :data="$products" exclude_columns="id, slug" searchable="true" sortable="true" paginated="true"
                        page-size="2" pagination_style="dropdown"/>
</x-layouts.dashboard-form>
