<x-layouts.dashboard>
    <x-dashboard.table
        :data="$data"
        :edit_route="route('dashboard.category.edit', ['category' => ':slug'])"
        :delete_route="route('dashboard.category.delete', ['category' => ':slug'])"
        exclude_columns="slug"
        modal_title="Delete Category"
        route_key=":slug"
    />
</x-layouts.dashboard>
