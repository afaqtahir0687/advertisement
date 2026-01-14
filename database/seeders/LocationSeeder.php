<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Saudi Arabia
        $sa = \App\Models\Country::create(['name' => 'Saudi Arabia', 'code' => 'SA']);
        
        $riyadhState = \App\Models\State::create(['country_id' => $sa->id, 'name' => 'Riyadh Region']);
        \App\Models\City::create(['state_id' => $riyadhState->id, 'name' => 'Riyadh']);
        \App\Models\City::create(['state_id' => $riyadhState->id, 'name' => 'Al-Kharj']);

        $makkahState = \App\Models\State::create(['country_id' => $sa->id, 'name' => 'Makkah Region']);
        \App\Models\City::create(['state_id' => $makkahState->id, 'name' => 'Jeddah']);
        \App\Models\City::create(['state_id' => $makkahState->id, 'name' => 'Makkah']);
        \App\Models\City::create(['state_id' => $makkahState->id, 'name' => 'Taif']);

        $easternState = \App\Models\State::create(['country_id' => $sa->id, 'name' => 'Eastern Province']);
        \App\Models\City::create(['state_id' => $easternState->id, 'name' => 'Dammam']);
        \App\Models\City::create(['state_id' => $easternState->id, 'name' => 'Khobar']);
        \App\Models\City::create(['state_id' => $easternState->id, 'name' => 'Dhahran']);

        // Pakistan
        $pk = \App\Models\Country::create(['name' => 'Pakistan', 'code' => 'PK']);

        $punjab = \App\Models\State::create(['country_id' => $pk->id, 'name' => 'Punjab']);
        \App\Models\City::create(['state_id' => $punjab->id, 'name' => 'Lahore']);
        \App\Models\City::create(['state_id' => $punjab->id, 'name' => 'Faisalabad']);
        \App\Models\City::create(['state_id' => $punjab->id, 'name' => 'Multan']);
        \App\Models\City::create(['state_id' => $punjab->id, 'name' => 'Rawalpindi']);

        $sindh = \App\Models\State::create(['country_id' => $pk->id, 'name' => 'Sindh']);
        \App\Models\City::create(['state_id' => $sindh->id, 'name' => 'Karachi']);
        \App\Models\City::create(['state_id' => $sindh->id, 'name' => 'Hyderabad']);

        $kpk = \App\Models\State::create(['country_id' => $pk->id, 'name' => 'Khyber Pakhtunkhwa']);
        \App\Models\City::create(['state_id' => $kpk->id, 'name' => 'Peshawar']);

        $balochistan = \App\Models\State::create(['country_id' => $pk->id, 'name' => 'Balochistan']);
        \App\Models\City::create(['state_id' => $balochistan->id, 'name' => 'Quetta']);

        $islamabad = \App\Models\State::create(['country_id' => $pk->id, 'name' => 'Islamabad Capital Territory']);
        \App\Models\City::create(['state_id' => $islamabad->id, 'name' => 'Islamabad']);
    }
}
