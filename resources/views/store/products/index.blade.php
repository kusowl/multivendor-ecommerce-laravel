<x-layouts.store>
    <section class="products section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                        <h4 class="widget-title">Short By</h4>
                        <form method="post" action="#">
                            <select class="form-control">
                                <option>Man</option>
                                <option>Women</option>
                                <option>Accessories</option>
                                <option>Shoes</option>
                            </select>
                        </form>
                    </div>
                    <div class="widget product-category">
                        <h4 class="widget-title">Categories</h4>
                        <x-store.accordian>
                            @foreach ($categories as $categoryItem)
                                <x-store.accordian-item :key="$categoryItem->id" :title="$categoryItem->name" :items="$categoryItem->subCategories" :link="$categoryItem->link" :isOpen="$categoryItem->id === $category->id " :activeKey="$subCategory->id"/>
                            @endforeach
                        </x-store.accordian>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($products as $product)
                        <x-store.product :product='$product'/>
                        @endforeach
                        @if(count($products) === 0)
                        <div class="col-md-9">
                            <p class="text-center">No Products found </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.store>
