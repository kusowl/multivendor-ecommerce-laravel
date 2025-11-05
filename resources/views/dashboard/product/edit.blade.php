@php
    $selected_images = [];
    if($product->image){
        foreach(explode(',', $product->image) as $image){
            $selected_images[] = [
                'source' => \App\Utils\File::getImage($image)
            ];
        }
    }
@endphp
<x-layouts.dashboard-form>
    <x-bladewind::card class="mb-4 ">
        <form action="{{route('dashboard.product.update', ['product' => $product->slug])}}" method="post"
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <x-dashboard.error field="images"/>

            <x-bladewind::select
                name="category_id" label="Choose category"
                required="true" :data="$categories"
                label_key="name" value_key="id"
                :selected_value="$product->category->id"
                onselect="fetchSubCategoriesByCategory"
            />
            <x-dashboard.error field="category_id"/>

            <label for="sub_category_id" class="text-gray-500 text-[.95rem] pl-1.5 mb-2">Sub Category</label>
            <select name="sub_category_id" id="sub_category" class="bw-raw-select mb-2">
                @if($product->subCatgory === null)
                    <option value="" selected>None</option>
                @endif
                @foreach($subCatgories as $subCategory)
                    <option
                        value="{{$subCategory->id}}"
                        @selected($subCategory->id === $product->subCategory->id)
                    >
                        {{$subCategory->name}}
                    </option>
                @endforeach
            </select>

            <x-dashboard.error field="sub_category_id"/>

            <x-dashboard.tinymce-editor name="description">
                {{$product->description}}
            </x-dashboard.tinymce-editor>

            <x-bladewind::button can-submit="true">Submit</x-bladewind::button>
        </form>
    </x-bladewind::card>
    <script>
        const route = @json(route('dashboard.category.subcategory', ['category' => ':id']));
        const fetchSubCategoriesByCategory = async (category_id) => {
            const response = await axios.get(route.replace(':id', category_id));
            const data = response.data;
            let innerText = `<option value=":value">:label</option>`;
            let innerHtml = `<option value="">Select one</option>`;
            data.map((item) => {
                innerHtml = innerHtml.concat(innerText.replace(':label', item.name).replace(':value', item.id))
            })
            domEl('#sub_category').innerHTML = innerHtml;
        }
    </script>
</x-layouts.dashboard-form>
