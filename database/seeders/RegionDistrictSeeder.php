<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\District;
use App\Models\ServiceCenter;
use App\Models\Trade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample regions
        $regions = [
            'Upper West Region',
            'Northern Region',
            'Greater Accra Region',
            'Ashanti Region',
            'Western Region'
        ];

        foreach ($regions as $regionName) {
            Region::firstOrCreate(['region_name' => $regionName]);
        }

        // Get the created regions
        $upperWest = Region::where('region_name', 'Upper West Region')->first();
        $northern = Region::where('region_name', 'Northern Region')->first();
        $greaterAccra = Region::where('region_name', 'Greater Accra Region')->first();

        // Create sample districts for Upper West Region
        if ($upperWest) {
            $upperWestDistricts = [
                'Wa Municipal',
                'Wa East District',
                'Wa West District',
                'Nadowli-Kaleo District',
                'Jirapa Municipal',
                'Lawra Municipal'
            ];

            foreach ($upperWestDistricts as $districtName) {
                District::firstOrCreate([
                    'region_id' => $upperWest->id,
                    'district_name' => $districtName
                ]);
            }
        }

        // Create sample districts for Northern Region
        if ($northern) {
            $northernDistricts = [
                'Tamale Metropolitan',
                'Sagnarigu Municipal',
                'Savelugu Municipal',
                'Yendi Municipal',
                'Zabzugu District'
            ];

            foreach ($northernDistricts as $districtName) {
                District::firstOrCreate([
                    'region_id' => $northern->id,
                    'district_name' => $districtName
                ]);
            }
        }

        // Create sample districts for Greater Accra Region
        if ($greaterAccra) {
            $accraDistricts = [
                'Accra Metropolitan',
                'Tema Metropolitan',
                'Ga East Municipal',
                'Ga West Municipal',
                'Ga South Municipal'
            ];

            foreach ($accraDistricts as $districtName) {
                District::firstOrCreate([
                    'region_id' => $greaterAccra->id,
                    'district_name' => $districtName
                ]);
            }
        }

        // Create sample service centers
        $this->createServiceCenters();

        // Create sample trades
        $this->createTrades();
    }

    private function createServiceCenters(): void
    {
        // Get some districts to create service centers for
        $waMunicipal = District::where('district_name', 'Wa Municipal')->first();
        $tamaleMetropolitan = District::where('district_name', 'Tamale Metropolitan')->first();
        $accraMetropolitan = District::where('district_name', 'Accra Metropolitan')->first();

        // Service centers for Wa Municipal
        if ($waMunicipal) {
            $serviceCenters = [
                [
                    'district_id' => $waMunicipal->id,
                    'location' => 'Wa Central Service Center',
                    'town_city' => 'Wa',
                    'address' => 'Near Wa Central Market, Main Street',
                    'email' => 'wa.central@weenorth.com',
                    'phone_number' => '+233 39 222 1234',
                    'center_representative' => 'John Doe',
                    'opening_hours' => 'Monday-Friday: 8:00 AM - 5:00 PM, Saturday: 9:00 AM - 2:00 PM'
                ],
                [
                    'district_id' => $waMunicipal->id,
                    'location' => 'Wa Airport Service Center',
                    'town_city' => 'Wa',
                    'address' => 'Airport Road, near Wa Airport',
                    'email' => 'wa.airport@weenorth.com',
                    'phone_number' => '+233 39 222 5678',
                    'center_representative' => 'Jane Smith',
                    'opening_hours' => 'Monday-Saturday: 7:00 AM - 6:00 PM'
                ]
            ];

            foreach ($serviceCenters as $center) {
                ServiceCenter::firstOrCreate(
                    ['location' => $center['location']],
                    $center
                );
            }
        }

        // Service centers for Tamale Metropolitan
        if ($tamaleMetropolitan) {
            $serviceCenters = [
                [
                    'district_id' => $tamaleMetropolitan->id,
                    'location' => 'Tamale Main Service Center',
                    'town_city' => 'Tamale',
                    'address' => 'Hospital Road, Central Business District',
                    'email' => 'tamale.main@weenorth.com',
                    'phone_number' => '+233 37 222 9876',
                    'center_representative' => 'Abdul Rahman',
                    'opening_hours' => 'Monday-Friday: 8:00 AM - 5:30 PM'
                ]
            ];

            foreach ($serviceCenters as $center) {
                ServiceCenter::firstOrCreate(
                    ['location' => $center['location']],
                    $center
                );
            }
        }

        // Service centers for Accra Metropolitan
        if ($accraMetropolitan) {
            $serviceCenters = [
                [
                    'district_id' => $accraMetropolitan->id,
                    'location' => 'Osu Service Center',
                    'town_city' => 'Accra',
                    'address' => 'Oxford Street, Osu',
                    'email' => 'accra.osu@weenorth.com',
                    'phone_number' => '+233 30 222 1111',
                    'center_representative' => 'Mary Asante',
                    'opening_hours' => 'Monday-Friday: 8:00 AM - 6:00 PM, Saturday: 9:00 AM - 3:00 PM'
                ],
                [
                    'district_id' => $accraMetropolitan->id,
                    'location' => 'Adabraka Service Center',
                    'town_city' => 'Accra',
                    'address' => 'Kojo Thompson Road, Adabraka',
                    'email' => 'accra.adabraka@weenorth.com',
                    'phone_number' => '+233 30 222 2222',
                    'center_representative' => 'Kwame Owusu',
                    'opening_hours' => 'Monday-Saturday: 7:30 AM - 5:30 PM'
                ]
            ];

            foreach ($serviceCenters as $center) {
                ServiceCenter::firstOrCreate(
                    ['location' => $center['location']],
                    $center
                );
            }
        }
    }

    private function createTrades(): void
    {
        $trades = [
            [
                'trade_name' => 'Carpentry',
                'description' => 'Building and repairing wooden structures, furniture, and fixtures. Includes cabinet making, furniture construction, and general woodworking.'
            ],
            [
                'trade_name' => 'Plumbing',
                'description' => 'Installing and maintaining water supply, heating, and sanitation systems in residential and commercial buildings.'
            ],
            [
                'trade_name' => 'Electrical Work',
                'description' => 'Installing and maintaining electrical systems, wiring, and equipment in buildings and industrial settings.'
            ],
            [
                'trade_name' => 'Masonry',
                'description' => 'Building structures from individual units of stone, brick, concrete blocks, and other masonry materials.'
            ],
            [
                'trade_name' => 'Welding',
                'description' => 'Joining metals using high heat and specialized equipment for construction, manufacturing, and repair work.'
            ],
            [
                'trade_name' => 'Painting & Decoration',
                'description' => 'Applying paint, stain, and other finishes to buildings and structures, including interior and exterior decoration.'
            ],
            [
                'trade_name' => 'Roofing',
                'description' => 'Installing and repairing roofs on residential and commercial buildings using various materials and techniques.'
            ],
            [
                'trade_name' => 'Tailoring & Garment Making',
                'description' => 'Creating, altering, and repairing clothing and garments using traditional and modern techniques.'
            ],
            [
                'trade_name' => 'Hairdressing & Cosmetology',
                'description' => 'Cutting, styling, and treating hair, as well as providing beauty services for clients.'
            ],
            [
                'trade_name' => 'Auto Mechanics',
                'description' => 'Repairing and maintaining motor vehicles, including engines, transmissions, and other automotive systems.'
            ],
            [
                'trade_name' => 'Electronics Repair',
                'description' => 'Fixing and maintaining electronic devices, appliances, and equipment for household and commercial use.'
            ],
            [
                'trade_name' => 'Cooking & Catering',
                'description' => 'Preparing and cooking food in various culinary styles, including restaurant service and event catering.'
            ]
        ];

        foreach ($trades as $trade) {
            Trade::firstOrCreate(
                ['trade_name' => $trade['trade_name']],
                $trade
            );
        }

        // Create sample members
        $this->createSampleMembers();
    }

    private function createSampleMembers(): void
    {
        // Only create sample members if none exist
        if (\App\Models\Member::count() === 0) {
            \App\Models\Member::factory()->count(20)->create();
        }
    }
}
