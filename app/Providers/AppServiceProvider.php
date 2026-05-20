<?php

namespace App\Providers;

use App\Models\Item;
use App\Models\ShoppingList;
use App\Policies\ItemPolicy;
use App\Policies\ShoppingListPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(ShoppingList::class, ShoppingListPolicy::class);
        Gate::policy(Item::class, ItemPolicy::class);
    }
}
