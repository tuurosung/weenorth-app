<?php

namespace Tests\Feature;

use App\Models\District;
use App\Models\Member;
use App\Models\Region;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create required related data
        Region::factory()->count(3)->create();
        District::factory()->count(5)->create();
        Trade::factory()->count(5)->create();
    }

    public function test_member_index_page_displays_successfully(): void
    {
        $response = $this->get(route('member.index'));
        $response->assertStatus(200);
        $response->assertViewIs('app.members.index');
    }

    public function test_member_index_displays_members(): void
    {
        $members = Member::factory()->count(3)->create();

        $response = $this->get(route('member.index'));

        $response->assertStatus(200);
        $response->assertViewHas('members');

        foreach ($members as $member) {
            $response->assertSee($member->member_id);
            $response->assertSee($member->full_name);
        }
    }

    public function test_member_show_page_displays_successfully(): void
    {
        $member = Member::factory()->create();

        $response = $this->get(route('member.show', $member));

        $response->assertStatus(200);
        $response->assertViewIs('app.members.show');
        $response->assertViewHas('member');
        $response->assertSee($member->full_name);
        $response->assertSee($member->member_id);
    }

    public function test_member_can_be_created(): void
    {
        $region = Region::first();
        $district = District::first();
        $trade = Trade::first();

        $memberData = [
            'member_id' => 'TEST001', // Add member_id for testing
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->phoneNumber,
            'membership_type' => 'individual',
            'membership_status' => 'active',
            'joined_date' => now()->format('Y-m-d'),
            'region_id' => $region->id,
            'district_id' => $district->id,
            'trade_id' => $trade->id,
        ];

        $response = $this->post(route('member.store'), $memberData);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('members', [
            'member_id' => $memberData['member_id'],
            'first_name' => $memberData['first_name'],
            'last_name' => $memberData['last_name'],
            'email' => $memberData['email'],
        ]);
    }

    public function test_member_creation_validates_required_fields(): void
    {
        $response = $this->post(route('member.store'), []);

        $response->assertSessionHasErrors([
            'first_name',
            'last_name',
            'membership_type',
            'membership_status',
            'joined_date'
        ]);
    }

    public function test_member_email_must_be_unique(): void
    {
        $existingMember = Member::factory()->create(['email' => 'test@example.com']);

        $memberData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => 'test@example.com', // Same email
            'membership_type' => 'individual',
            'membership_status' => 'active',
            'joined_date' => now()->format('Y-m-d'),
        ];

        $response = $this->post(route('member.store'), $memberData);

        $response->assertSessionHasErrors('email');
    }

    public function test_member_can_be_updated(): void
    {
        $member = Member::factory()->create();

        $updateData = [
            'first_name' => 'Updated First',
            'last_name' => 'Updated Last',
            'email' => 'updated@example.com',
            'membership_type' => $member->membership_type,
            'membership_status' => 'inactive',
            'joined_date' => $member->joined_date->format('Y-m-d'),
        ];

        $response = $this->patch(route('member.update', $member), $updateData);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $member->refresh();
        $this->assertEquals('Updated First', $member->first_name);
        $this->assertEquals('Updated Last', $member->last_name);
        $this->assertEquals('updated@example.com', $member->email);
        $this->assertEquals('inactive', $member->membership_status);
    }

    public function test_member_can_be_deleted(): void
    {
        $member = Member::factory()->create();

        $response = $this->delete(route('member.delete', $member));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('members', ['id' => $member->id]);
    }

    public function test_member_edit_returns_correct_view(): void
    {
        $member = Member::factory()->create();

        $response = $this->get(route('member.edit', $member));

        $response->assertStatus(200);
        $response->assertViewIs('app.members.modals.edit');
        $response->assertViewHas('member', $member);
        $response->assertViewHas('regions');
        $response->assertViewHas('districts');
        $response->assertViewHas('trades');
    }

    public function test_member_relationships_work_correctly(): void
    {
        $region = Region::first();
        $district = District::first();
        $trade = Trade::first();

        $member = Member::factory()->create([
            'region_id' => $region->id,
            'district_id' => $district->id,
            'trade_id' => $trade->id,
        ]);

        $this->assertEquals($region->id, $member->region->id);
        $this->assertEquals($district->id, $member->district->id);
        $this->assertEquals($trade->id, $member->trade->id);
    }

    public function test_member_full_name_attribute_works(): void
    {
        $member = Member::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $this->assertEquals('John Doe', $member->full_name);
    }

    public function test_member_status_badge_attribute_works(): void
    {
        $activeMember = Member::factory()->create(['membership_status' => 'active']);
        $pendingMember = Member::factory()->create(['membership_status' => 'pending']);

        $this->assertStringContainsString('badge bg-success', $activeMember->status_badge);
        $this->assertStringContainsString('Active', $activeMember->status_badge);

        $this->assertStringContainsString('badge bg-warning', $pendingMember->status_badge);
        $this->assertStringContainsString('Pending', $pendingMember->status_badge);
    }
}
