<?php

namespace App\Services\Config;

class LocationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    private static function getData()
    {
        return json_decode(file_get_contents(storage_path('weenorth/cities.json')), true);
    }


    public static function getRegions()
    {
        $data = self::getData();
        $regions = [];

        foreach ($data as $key => $value) {
            $regions[] = $key;
        }

        return $regions;
    }


    public static function getCities()
    {
        $data = self::getData();
        $cities = [];

        foreach ($data as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                $cities[] = $value[$i];
            }
        }

        return $cities;
    }


    public static function getCitiesByRegion($region)
    {
        $data = self::getData();

        if (isset($data[$region])) {
            return $data[$region];
        }

        return [];
    }
}
