<x-layouts.dashboard>
    <x-dashboard.table
        :data="$data"
        :edit_route="route('dashboard.sub-category.edit', ['subCategory' => ':slug'])"
        :delete_route="route('dashboard.sub-category.delete', ['subCategory' => ':slug'])"
        exclude_columns="id, slug, category_id"
        modal_title="Delete Sub-Category"
        route_key=":slug"
    />

</x-layouts.dashboard>
