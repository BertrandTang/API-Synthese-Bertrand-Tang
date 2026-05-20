<?php

namespace App\Policies;

use App\Models\ShoppingList;
use App\Models\User;

class ShoppingListPolicy
{
    /**
     * A user can view only their own shopping list.
     */
    public function view(User $user, ShoppingList $shoppingList): bool
    {
        return $shoppingList->user_id === $user->id;
    }

    /**
     * Shopping lists are read-only for users.
     */
    public function update(User $user, ShoppingList $shoppingList): bool
    {
        return false;
    }

    /**
     * Shopping lists cannot be deleted by users.
     */
    public function delete(User $user, ShoppingList $shoppingList): bool
    {
        return false;
    }
}
