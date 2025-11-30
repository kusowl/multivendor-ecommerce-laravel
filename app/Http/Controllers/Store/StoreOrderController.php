<?php

namespace App\Http\Controllers\Store;

use App\Dto\Base\PaginationLinksDto;
use App\Dto\Order\OrderDto;
use App\Dto\Order\OrderItemDto;
use App\Http\Controllers\Controller;
use App\Utils\TitleBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreOrderController extends Controller
{
    public function index(Request $request)
    {
        $paginatedOrders = Auth::user()
            ->orders()
            ->latest()
            ->with([
                'products' => fn (BelongsToMany $query) => $query->withPivot('quantity'),
            ])
            ->paginate(12)
            ->through(fn ($item) => OrderItemDto::fromModel($item));
        $orderCollectionDto = new OrderDto(
            items: $paginatedOrders->items(),
            links: PaginationLinksDto::fromPaginator($paginatedOrders),
        );

        return view('store.order.index')
            ->with('title', new TitleBuilder()->add('Orders')->build())
            ->with('orders', $orderCollectionDto);
    }
}
