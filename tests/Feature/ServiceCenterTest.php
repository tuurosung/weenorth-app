<?php

namespace Tests\Feature;

use App\Models\ServiceCenter;
use App\Models\District;
use App\Models\Region;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceCenterTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_center_belongs_to_district(): void
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $serviceCenter = ServiceCenter::factory()->create(['district_id' => $district->id]);

        $this->assertInstanceOf(District::class, $serviceCenter->district);
        $this->assertEquals($district->id, $serviceCenter->district->id);
    }

    public function test_district_has_many_service_centers(): void
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $serviceCenters = ServiceCenter::factory()->count(3)->create(['district_id' => $district->id]);

        $this->assertCount(3, $district->serviceCenters);
        $this->assertEquals(3, $district->number_of_service_centers);
    }

    public function test_service_center_can_access_region_through_district(): void
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $serviceCenter = ServiceCenter::factory()->create(['district_id' => $district->id]);

        $serviceCenter->load('district.region');

        $this->assertEquals($region->id, $serviceCenter->district->region->id);
    }

    public function test_service_center_index_requires_authentication(): void
    {
        $response = $this->get(route('service-center.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_service_centers(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('service-center.index'));
        $response->assertStatus(200);
    }
}
