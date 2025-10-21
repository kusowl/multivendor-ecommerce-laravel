<x-layouts.dashboard>
    <div class="w-full">

        <x-bladewind::table
            :data="$data->all()"
            exclude_columns="id, slug, category_id"
            searchable="true"
            sortable="true"
            striped="true"
            compact="true"
        />

        <div class="pagination mt-4">
            {{ $data->links() }}
        </div>
    </div>

</x-layouts.dashboard>
