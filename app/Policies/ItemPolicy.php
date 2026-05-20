<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;

class ItemPolicy
{
    /**
     * A user can view only items from their own shopping list.
     */
    public function view(User $user, Item $item): bool
    {
        return $item->shoppingList->user_id === $user->id;
    }

    /**
     * A user can update only items from their own shopping list.
     */
    public function update(User $user, Item $item): bool
    {
        return $item->shoppingList->user_id === $user->id;
    }

    /**
     * A user can delete only items from their own shopping list.
     */
    public function delete(User $user, Item $item): bool
    {
        return $item->shoppingList->user_id === $user->id;
    }
}
