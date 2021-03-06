<?php

namespace GetThingsDone\DynamicConfig\Tests;

use GetThingsDone\DynamicConfig\Models\DynamicConfig;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreDynamicConfigTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function store_dynamic_config_to_db()
    {
        DynamicConfig::create([
            'key' => 'logo',
            'value' => ['filename' => 'logo.png'],
        ]);

        $this->assertDatabaseHas('dynamic_configs', [
            'key' => 'logo',
            'value' => json_encode(['filename' => 'logo.png']),
        ]);
    }
}
