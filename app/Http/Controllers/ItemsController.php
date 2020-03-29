<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use \Exception;


class ItemsController extends Controller
{

    public function index()
    {
        $items = Item::all();

        return response()->json($items);
    }
    
    /**
     * Retrieves an item by the item id. 
     * 
     * @param string $itemId
     * @return object 
     *  
     */
    public function retrieveByItemId($itemId)
    {
        try {
            $item = Item::findOrFail($itemId);
        }
        catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json($this->createItemArray($item));
    }

    /**
     * Retrieves an item by the item name via $request->input('itemName');
     * 
     * @param object $request
     * @return object 
     *  
     */
    public function retrieveByItemName(Request $request)
    {
        $itemName = $request->query('name');

        try {

            $item = Item::where('name', $itemName)->firstOrFail();
        }
        catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json($this->createItemArray($item));
    }

     /**
     * Converts the item into a sanitized item array. Used in the JSON responses.;
     * 
     * @param object $item
     * @return array 
     *  
     */
    private function createItemArray(Item $item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'type' => $item->type->name,
            'value' => (int) $item->value,
            'image' => $item->image_path
        ];
    }


}
