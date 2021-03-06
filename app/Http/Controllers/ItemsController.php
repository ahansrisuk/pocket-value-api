<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use \Exception;

class ItemsController extends Controller
{
    public function index()
    {
        // get all items with 'type' relation alphabetically;
        $items = Item::all()->sortBy('name');
        $response = [];

        foreach ($items as $item) {
            $entry = [
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type->name,
                'location' => $item->location->name,
                'time' => $item->time->period,
                'value' => $item->value,
                'northern_months' => $item->northernMonths(),
                'southern_months' => $item->southernMonths(),
                'image_path' => $item->image_path
            ];
            
            array_push($response, $entry);

        }

        return response()->json($response);
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
