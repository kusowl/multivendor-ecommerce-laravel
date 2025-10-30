<x-layouts.dashboard-form>
    @php
        var_dump($errors);
    @endphp
    <x-bladewind::card class="mb-4 ">
        <form action="{{route('dashboard.product.create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <x-input-text name="name" required="true" label="Product name"/>

            <div class="flex gap-3">
                <x-input-text name="price" label="Price" required="true"/>
                <x-input-text name="stock" label="Stock" required="true"/>
            </div>

            <x-bladewind::filepicker
                name="images[]"
                show_image_preview="true"
                accepted-file-types="image/*"
                max_file_size="{{config('file.max_image_size')}}mb"
                max_files="5"
            />
            <x-error field="images"/>

            <x-bladewind::select
                name="category_id" label="Choose category"
                required="true" :data="$categories"
                label_key="name" value_key="id"
                :selected_value="old('category_id')"
                onselect="fetchSubCategoriesByCategory"
            />
            <x-error field="category_id"/>

            <label for="sub_category_id" class="text-gray-500 text-[.95rem] pl-1.5 mb-2">Sub Category</label>
            <select name="sub_category_id" id="sub_category" class="bw-raw-select mb-2">
                <option value="">Choose category first</option>
            </select>

            <x-error field="sub_category_id"/>

            <x-dashboard.tinymce-editor name="description"/>

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
