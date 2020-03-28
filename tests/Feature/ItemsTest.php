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
                'type' => $item->type->name,
                'value' => $item->value,
                'image' => $item->image_path
            ]);
        
    }

    /** @test */
    public function it_can_be_retrieved_by_name()
    {
        $type = factory(Type::class)->create(['name' => 'fish']);
        $item = factory(Item::class)->create(['type_id' => $type->id]);

        $this->get('/api/items/' . $item->id)
            ->seeJson([
                'id' => $item->id,
                'type' => $item->type->name,
                'value' => $item->value,
                'image' => $item->image_path
            ]);
        
    }

}
