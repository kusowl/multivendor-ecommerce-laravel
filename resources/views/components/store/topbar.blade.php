<div class="bg-base-100 shadow-base-content/5 shadow-lg flex">
    <ul class="hidden md:flex menu menu-horizontal rounded-box mx-auto">
        @foreach($categories as $category)
            <li>
                <details>
                    <summary>{{$category->name}}</summary>
                    <ul class="z-1">
                        @foreach($category->subCategories as $subCategory)
                            <li>
                                <a href="{{route('store.categories.subCategories.show',[$category, $subCategory->slug])}}">{{$subCategory->name}}</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{route('store.categories.show', $category)}}">See all</a>
                        </li>
                    </ul>
                </details>
                @endforeach
            </li>
    </ul>
</div>
