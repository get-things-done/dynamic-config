<?php
namespace GetThingsDone\DynamicConfig;

use GetThingsDone\DynamicConfig\DynamicConfig;
use GetThingsDone\DynamicConfig\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RetrieveDynamicConfigTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_all_configs()
    {
        \GetThingsDone\DynamicConfig\Models\DynamicConfig::create([
            'key' => 'logo',
            'value' => ['filename' => 'logo.png']
        ]);

        $this->assertEquals(
            [
                'logo' => ['filename' => 'logo.png']
            ],
            app(DynamicConfig::class)->all()
        );
    }

    /** @test */
    public function it_can_get_by_dot()
    {
        \GetThingsDone\DynamicConfig\Models\DynamicConfig::create([
            'key' => 'logo',
            'value' => ['filename' => 'logo.png']
        ]);

        $this->assertEquals(
            'logo.png',
            app(DynamicConfig::class)->get('logo.filename')
        );
    }
}