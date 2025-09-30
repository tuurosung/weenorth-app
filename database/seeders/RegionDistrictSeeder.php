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
            'Upper East Region',
            'Savannah Region',
            'North East Region',
            'Northern Region',
        ];

        foreach ($regions as $regionName) {
            Region::firstOrCreate(['region_name' => $regionName]);
        }

        // Get the created regions
        $upperWest = Region::where('region_name', 'Upper West Region')->first();
        $upperEast = Region::where('region_name', 'Upper East Region')->first();
        $savannah = Region::where('region_name', 'Savannah Region')->first();
        $northEast = Region::where('region_name', 'North East Region')->first();
        $northern = Region::where('region_name', 'Northern Region')->first();


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


        // Create sample districts for Upper East Region
        if ($upperEast) {
            $upperEastDistricts = [
                'Bawku Municipal',
                'Bolgatanga Municipal',
                'Bongo Municipal',
                'Navrongo Municipal',
                'Paga Municipal',
                'Tongo Municipal',
                'Garu-Tempane District',
                'Talensi District',
                'Kassena-Nankana Municipal',
                'Kassena-Nankana West District',
                'Nabdam District',
            ];

            foreach ($upperEastDistricts as $districtName) {
                District::firstOrCreate([
                    'region_id' => $upperEast->id,
                    'district_name' => $districtName
                ]);
            }
        }


        // Create sample districts for Savannah Region
        if ($savannah) {

            $savannahDistricts = [
                'Damongo Municipal',
                'Bole District',
                'Sawla-Tuna-Kalba District',
                'West Gonja District',
                'Salaga Municipal'
            ];

            foreach ($savannahDistricts as $districtName) {
                District::firstOrCreate([
                    'region_id' => $savannah->id,
                    'district_name' => $districtName
                ]);
            }
        }


        // Create sample districts for North East Region
        if ($northEast) {
            $northEastDistricts = [
                'Nalerigu Municipal',
                'Bunkpurugu Municipal',
                'East Mamprusi District',
                'West Mamprusi District',
                'Chereponi District',
            ];

            foreach ($northEastDistricts as $districtName) {
                District::firstOrCreate([
                    'region_id' => $northEast->id,
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
                'Zabzugu District',
                'Nanumba North District',
                'Nanumba South District',
                'Gushegu Municipal',
                'Karaga District',
                'Mion District',
                'Kumbungu District',
                'Tolon District',
                'Nanton District',
                'Saboba District',
            ];

            foreach ($northernDistricts as $districtName) {
                District::firstOrCreate([
                    'region_id' => $northern->id,
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
    }

    private function createTrades(): void
    {
        $trades = [
            [
                'trade_name' => 'Electricals',
                'description' => 'Installing and maintaining electrical systems, wiring, and equipment in buildings and industrial settings.'
            ],
            [
                'trade_name' => 'Solar Panel Installation',
                'description' => 'Installing and maintaining solar panel systems for residential and commercial properties.'
            ],
            [
                'trade_name' => 'Woodwork',
                'description' => 'Creating and repairing wooden structures, furniture, and fixtures. Includes cabinet making, furniture construction, and general woodworking.'
            ],
            [
                'trade_name' => 'Plumbing And Gas Fitting',
                'description' => 'Installing and maintaining plumbing and gas systems in residential and commercial buildings.'
            ],
            [
                'trade_name' => 'Bricklaying',
                'description' => 'Laying and repairing bricks and mortar for residential and commercial buildings.'
            ],
            [
                'trade_name' => 'Tiling',
                'description' => 'Installing tiles on floors, walls, and other surfaces, including preparation and finishing work.'
            ],
            [
                'trade_name' => 'Small Engine Repair',
                'description' => 'Repairing and maintaining small engines, such as those found in lawn mowers, chainsaws, and other outdoor equipment.'
            ],
            [
                'trade_name' => 'Painting',
                'description' => 'Applying paint, stain, and other finishes to buildings and structures, including interior and exterior decoration.'
            ],
            [
                'trade_name' => 'POP (Plaster Of Paris Crown Moulding)',
                'description' => 'Creating decorative elements and finishes using plaster of Paris, including crown moulding and other architectural details.'
            ],
            [
                'trade_name' => 'Eco-Friendly Construction Materials',
                'description' => 'Using sustainable and environmentally friendly materials in construction projects, such as recycled materials, bamboo, and other green building products.'
            ],
            [
                'trade_name' => 'Air Conditioner Servicing',
                'description' => 'Fixing and maintaining air conditioning systems in residential and commercial buildings.'
            ],
            [
                'trade_name' => 'Tracktor Driving With Implements',
                'description' => 'Operating tractors and other heavy machinery with various implements for agricultural and construction tasks.'
            ],
            [
                'trade_name' => 'Agricultural Mechanization',
                'description' => 'Using machinery and technology to improve agricultural productivity and efficiency.'
            ],
            [
                'trade_name' => 'Solar Powered Irrigation',
                'description' => 'Installing and maintaining solar-powered irrigation systems for agricultural use.'
            ],
            [
                'trade_name' => 'Vinyl Flooring Installation',
                'description' => 'Installing vinyl flooring in residential and commercial properties, including preparation and finishing work.'
            ],
            [
                'trade_name' => 'Astroturf Installation',
                'description' => 'Installing artificial turf for sports fields, landscaping, and other applications.'
            ],
            [
                'trade_name' => 'Welding',
                'description' => 'Joining metal parts together using various welding techniques for construction and manufacturing purposes.'
            ]
        ];

        foreach ($trades as $trade) {
            Trade::firstOrCreate(
                ['trade_name' => $trade['trade_name']],
                $trade
            );
        }

        // Create sample members
        // $this->createSampleMembers();
    }

    // private function createSampleMembers(): void
    // {
    //     // Only create sample members if none exist
    //     if (\App\Models\Member::count() === 0) {
    //         \App\Models\Member::factory()->count(20)->create();
    //     }
    // }
}
