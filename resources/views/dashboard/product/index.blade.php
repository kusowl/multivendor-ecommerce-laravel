<x-layouts.dashboard>
    <x-dashboard.table
        :data="$data"
        :edit_route="route('dashboard.product.edit', ['product' => ':slug'])"
        :delete_route="route('dashboard.product.destroy', ['product' => ':slug'])"
        :view_route="route('store.products.show', ['product' => ':slug'])"
        exclude_columns="id, slug"
        modal_title="Delete Product"
        route_key=":slug"
    />

</x-layouts.dashboard>
