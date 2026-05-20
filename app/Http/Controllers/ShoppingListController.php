<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShoppingListController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $shoppingList = $request->user()
            ->shoppingList()
            ->with('items')
            ->first();

        abort_if($shoppingList === null, 404);

        Gate::authorize('view', $shoppingList);

        return response()->json($shoppingList);
    }

    public function storeItem(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:50'],
        ]);

        $shoppingList = $request->user()->shoppingList()->firstOrCreate();

        $item = $shoppingList->items()->create($validated);

        return response()->json($item, 201);
    }

    public function updateItem(Request $request, Item $item): JsonResponse
    {
        Gate::authorize('update', $item);

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:50'],
        ]);

        $item->update($validated);

        return response()->json($item);
    }

    public function destroyItem(Item $item): JsonResponse
    {
        Gate::authorize('delete', $item);

        $item->delete();

        return response()->json(status: 204);
    }
}
