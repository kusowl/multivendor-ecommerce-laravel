@props([
    'data' => [],
    'action_icons' => [],
    'modal_title' => '',
    'delete_route' => '',
    'edit_route' => '',
    'view_route' => '',
    'route_key' => '',
    'exclude_columns' => ''
])
@php
    if($action_icons === []){
        $key = str_replace(':','',$route_key);
        $action_icons = [];
        if($edit_route !== ''){
            $action_icons[] = "icon:pencil | tip:edit | click:editItem('{{$key}}')";
        }
        if($view_route !== ''){
        $action_icons[] = "icon:eye | tip:view | click:viewItem('{{$key}}')";
        }
        if($delete_route !== ''){
            $action_icons[]  = "icon:trash | color:red | tip:delete | click:showModal('delete-item', {slug: '{{$key}}'})";
        }
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
    const viewUrl = @json($view_route);
    const viewItem = (value) => {
        window.open(viewUrl.replace(@json($route_key), value), "_blank");
    }
</script>
