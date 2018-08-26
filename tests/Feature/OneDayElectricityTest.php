<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

use App\Models\OneHourElectricity;
use App\Models\Panel;

class OneDayElectricityTest extends TestCase
{

    use RefreshDatabase;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexForData()
    {
        $panel = factory(Panel::class)->make();
        $panel->save();
        factory(OneHourElectricity::class)->make([ 'panel_id' => $panel->id ])->save();

        $response = $this->json('GET', '/api/one_day_electricities?panel_serial='.$panel->serial);

        $response->assertStatus(200);

        $this->assertCount(1, json_decode($response->getContent()));
    }

    /**
     * Test to check response.
     *
     * @return void
     */
    public function testIndexWithoutPanelSerial()
    {
        $response = $this->json('GET', '/api/one_day_electricities');

        $response->assertStatus(404);
    }
}
