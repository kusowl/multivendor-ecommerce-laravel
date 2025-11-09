<x-layouts.store :title="$title">
    <x-store.page-header page="Categories"/>
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <div class="widget product-category">
                        <div class="panel-group commonAccordion" id="accordion" role="tablist"
                             aria-multiselectable="true">
                            @foreach($category as $index => $item)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h3 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse{{$index}}"
                                               aria-expanded="true" aria-controls="collapseOne">
                                                {{$item->name}}
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapse{{$index}}" class="panel-collapse collapse in" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul>
                                                @foreach($item->subCategories as $subItem)
                                                    <li><a href="{{route('store.categories.subCategories.show', [$item->slug, $subItem->slug])}}">{{$subItem->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.store>
