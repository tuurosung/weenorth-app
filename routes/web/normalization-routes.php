<?php

use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/normalization', function () {

    $regions = ['upper_west', 'upper_east', 'north_east', 'northern'];

    foreach ($regions as $region) {

        $getRegionalMembers = DB::table($region)->where(function ($query) {
            $query->whereNotNull('weenorth_id')
                ->orWhereNotNull('name')
                ->orWhereNotNull('program');
        })->get();

        insertRegionalMembers($getRegionalMembers);

    }

    $members = Member::whereNotNull('weenorth_id')->get();

    $members->each(function ($member) {
        $name = $member->name;
        $parts = explode(' ', $name);
        $member->first_name = $parts[0];
        $member->last_name = implode(' ', array_slice($parts, 1));
        $member->save();
    });

});

Route::get('/splitAndUpdateName', function () {

    $members = Member::whereNotNull('weenorth_id')->get();

    $members->each(function ($member) {
        $name = $member->name;
        $parts = explode(' ', $name);
        $member->first_name = $parts[0];
        $member->last_name = implode(' ', array_slice($parts, 1));
        $member->save();
    });


    // delete members without weenorth id
    Member::whereNull('weenorth_id')->delete();
});


function  insertRegionalMembers($regionalMembers) {
    // loop through the members and normalize the data
    $regionalMembers->each(function ($member) {

        // get district id from districts table
        $districtName = trim($member->district);

        if ($districtName == 'Bongo Municipality' || $districtName == 'Bongo District') {
            $districtName = 'Bongo Municipal';
        }

        if ($districtName == 'Kasena Nankana Municipal' || $districtName == 'Kasena Nankana District') {
            $districtName = 'Kassena Nankana Municipal';
        }

        if ($districtName == 'Kasena Nankana West') {
            $districtName = 'Kassena Nankana West District';
        }

        if ($districtName == 'Bunkpurugu Nankpanduri') {
            $districtName = 'Bunkpurugu Municipal';
        }

        $district = DB::table('districts')->whereLike('district_name', "%{$districtName}%")->first();

        if (!$district) {
            dd($member->district);
        }


        $district_id = $district->id;
        $region_id = $district->region_id;

        // get the trade id from trades table
        $trade = DB::table('trades')->whereLike('trade_name', "%{$member->program}%")->first();
        // dd($trade);
        if (!$trade) {
            dd($member->program);
        }
        $trade_id = $trade->id;

        // check if member is already in the database

        $memberExists = DB::table('membership_import')->where('weenorth_id', $member->weenorth_id)->first();

        if ($memberExists) {
            return; // skip if member already exists
        }


        DB::table('membership_import')->insertOrIgnore([
            'weenorth_id' => $member->weenorth_id,
            'cohort' => $member->cohort,
            'region_of_school' => $member->region_of_school,
            'name' => $member->name,
            'contact' => $member->contact,
            'age' => $member->age,
            'community' => $member->community,
            'institution_name' => $member->institution_name,
            'district' => $member->district,
            'program' => $member->program,
            'trade_id' => $trade_id,
            'district_id' => $district_id,
            'region_id' => $region_id,
        ]);

    });
}
