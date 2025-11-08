<?php

namespace App\Providers;

use App\Dto\Cart\CartDto;
use App\Dto\Cart\CartProductItemDto;
use App\Models\Category;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);

            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('components.store.navbar', function (View $view) {
            $categories = Category::where('sub_categories_count', '>=', 3)->take(3)->get();
            $view->with('categories', $categories);
        });

        Facades\View::composer('components.store.cart', function (View $view) {
            $cartDto = new CartDto;
            /**
             * Take 3 recent products from user cart, and transfrom it in DTO.
             */
            if (Auth::check()) {
                $userCart = Auth::user()->cart()->firstOrCreate();
                $productsDto = $userCart
                    ->products()
                    ->withPivot('quantity')
                    ->take(3)
                    ->get()
                    ->map(fn ($item) => CartProductItemDto::fromModel($item, $item->pivot->quantity));

                $cartDto = new CartDto(
                    id: $userCart->id,
                    products: $productsDto,
                    cartPrices: $userCart->getPrices(),
                );
            }
            $view->with('cart', $cartDto);
        });
    }
}
