<x-layouts.dashboard-form>
    <x-bladewind::card class="mb-4 ">
        <form action="{{route('dashboard.product.create')}}" method="post">
            @csrf
            <x-input-text name="name" required="true" label="Product name"/>

            <x-input-text name="price" label="Price" required="true"/>

            <x-input-text name="stock" label="Stock" required="true"/>

            <x-input-textarea name="description" label="Description" required="true"/>

            <x-bladewind::select
                name="category_id" label="select category"
                required="true" :data="$categories"
                label_key="name" value_key="id"
                filter="sub_category_id"
            />
            <x-error field="category_id"/>
            <x-bladewind::select
                name="sub_category_id" label="select sub category"
                label_key="name" value_key="id"
                :data="$subCategories"
                filter-by="category_id"
            />
            <x-error field="sub_category_id"/>

            <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
        </form>
    </x-bladewind::card>
    <script>
    </script>
</x-layouts.dashboard-form>
