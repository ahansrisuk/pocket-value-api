<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Item;
use App\Type;

class ItemsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function it_can_be_retrieved_by_id()
    {
        $type = factory(Type::class)->create(['name' => 'fish']);
        $item = factory(Item::class)->create(['type_id' => $type->id]);

        $this->get('/api/items/' . $item->id)
            ->seeJson([
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type->name,
                'value' => $item->value,
                'image' => $item->image_path
            ]);
        
    }

    /** @test */
    public function it_fails_gracefully_when_item_id_is_not_found()
    {
        $this->get('/api/items/' . '55555')
            ->seeJson([
                'error' => true
            ]);
        
    }

    /** @test */
    public function it_can_be_retrieved_by_item_name()
    {
        $type = factory(Type::class)->create(['name' => 'fish']);
        $item = factory(Item::class)->create(['type_id' => $type->id]);

        $this->get('/api/items/search?name=' . $item->name)
            ->seeJson([
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type->name,
                'value' => $item->value,
                'image' => $item->image_path
            ]);
        
    }

    /** @test */
    public function it_fails_gracefully_when_item_name_is_not_found()
    {
        $this->get('/api/items/search', ['itemName' => 'made up item'])
        ->seeJson([
            'error' => true
        ]);
        
    }
}
