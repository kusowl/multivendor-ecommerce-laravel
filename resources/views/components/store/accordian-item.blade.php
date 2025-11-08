@props(['title'=> '','items' => [], 'key', 'isOpen' => false, 'link' => '', 'activeKey' => null])
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
            <a href="{{$link}}">{{$title}}</a>
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="false"
               aria-controls="collapse{{$key}}"
            >
            </a>
        </h4>
    </div>
    <div id="collapse{{$key}}" class="panel-collapse collapse {{$isOpen ? 'in' : ''}}" role="tabpanel"
         aria-labelledby="headingThree">
        <div class="panel-body">
            <ul>
                @foreach($items as $item)
                    @if ($activeKey === $item->id)
                        <li><a href="{{$item->link ?? '#'}}" style="background-color:#666; color:white; padding-inline:10px; padding-block:4px;">{{$item->name}}</a></li>
                    @else
                        <li><a href="{{$item->link ?? '#'}}">{{$item->name}}</a></li>
                    @endif
                @endforeach
                </ul>
        </div>
    </div>
</div>
