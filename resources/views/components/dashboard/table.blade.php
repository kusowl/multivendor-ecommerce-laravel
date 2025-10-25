@props([
    'data' => [],
    'action_icons' => [],
    'modal_title' => '',
    'delete_route' => '',
    'edit_route' => '',
    'route_key' => '',
    'exclude_columns' => ''
])
@php
    if($action_icons === []){
        $key = str_replace(':','',$route_key);
        $action_icons = [
            "icon:pencil | tip:edit | click:editItem('{{$key}}')",
            "icon:trash | color:red | tip:delete | click:showModal('delete-item', {slug: '{{$key}}'})",
        ];
    }
@endphp
<div class="w-full">
    <x-bladewind::table
        :data="$data['data']"
        :action_icons="$action_icons"
        :exclude_columns="$exclude_columns"
        searchable="true"
        sortable="true"
        divider="thin"
        compact="true"
        celled="true"
    />
    <x-dashboard.pagination :data="$data"/>
</div>
<x-dashboard.modal-delete :title='$modal_title' :route='$delete_route'/>
<script>
    const editUrl = @json($edit_route);
    const editItem = (value) => {
        window.location.href = editUrl.replace(@json($route_key), value);
    }
</script>
