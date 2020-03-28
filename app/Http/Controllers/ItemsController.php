<?php

namespace App\Http\Controllers;

use App\Item;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($itemId)
    {
        $item = Item::find($itemId);
        
        return response()->json([
            'id' => $item->id,
            'type' => $item->type->name,
            'value' => (int) $item->value,
            'image' => $item->image_path
        ]);
    }

    //
}
