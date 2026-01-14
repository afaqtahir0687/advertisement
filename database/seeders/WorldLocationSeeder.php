<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorldLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Truncate tables to safely replace old data
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('cities')->truncate();
        \Illuminate\Support\Facades\DB::table('states')->truncate();
        \Illuminate\Support\Facades\DB::table('countries')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        echo "Importing Countries...\n";
        // 2. Load Countries
        $countriesJson = file_get_contents('https://raw.githubusercontent.com/hiiamrohit/Countries-States-Cities-database/master/countries.json');
        $countries = json_decode($countriesJson, true)['countries'];
        foreach ($countries as $country) {
            \Illuminate\Support\Facades\DB::table('countries')->insert([
                'id' => (int)$country['id'],
                'name' => $country['name'],
                'code' => $country['sortname'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $validCountryIds = \Illuminate\Support\Facades\DB::table('countries')->pluck('id')->toArray();
        $validCountryIds = array_flip($validCountryIds);

        echo "Importing States (this may take a minute)...\n";
        // 3. Load States
        $statesJson = file_get_contents('https://raw.githubusercontent.com/hiiamrohit/Countries-States-Cities-database/master/states.json');
        $statesArray = json_decode($statesJson, true);
        $states = $statesArray['states'] ?? [];
        
        $stateBatches = array_chunk($states, 500);
        foreach ($stateBatches as $batch) {
            $data = [];
            foreach ($batch as $state) {
                if (isset($state['id']) && is_numeric($state['id']) && isset($validCountryIds[(int)$state['country_id']])) {
                    $data[] = [
                        'id' => (int)$state['id'],
                        'name' => $state['name'],
                        'country_id' => (int)$state['country_id'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            if (!empty($data)) {
                \Illuminate\Support\Facades\DB::table('states')->insert($data);
            }
        }

        $validStateIds = \Illuminate\Support\Facades\DB::table('states')->pluck('id')->toArray();
        $validStateIds = array_flip($validStateIds);

        echo "Importing Cities (this will take several minutes - please wait)...\n";
        // 4. Load Cities
        $citiesJson = file_get_contents('https://raw.githubusercontent.com/hiiamrohit/Countries-States-Cities-database/master/cities.json');
        $citiesArray = json_decode($citiesJson, true);
        $cities = $citiesArray['cities'] ?? [];
        
        $cityBatches = array_chunk($cities, 1000); 
        foreach ($cityBatches as $batch) {
            $data = [];
            foreach ($batch as $city) {
                if (isset($city['id']) && is_numeric($city['id']) && isset($city['state_id']) && is_numeric($city['state_id']) && isset($validStateIds[(int)$city['state_id']])) {
                    $data[] = [
                        'id' => (int)$city['id'],
                        'name' => $city['name'],
                        'state_id' => (int)$city['state_id'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            if (!empty($data)) {
                \Illuminate\Support\Facades\DB::table('cities')->insert($data);
            }
        }
        
        echo "Global data import complete!\n";
    }
}
