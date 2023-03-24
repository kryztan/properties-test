<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Property Admin',
            'email' => 'admin@property.com',
            'password' => 'password'
        ]);

        PropertyType::create([
            'name' => 'Detached',
            'description' => 'a single dwelling not attached to any other dwelling or structure (except its own garage or shed)',
        ]);

        PropertyType::create([
            'name' => 'Semi-detached',
            'description' => 'a single family duplex dwelling house that shares one common wall with the next house',
        ]);

        PropertyType::create([
            'name' => 'Flat',
            'description' => "a housing unit that's self-contained but is part of a larger building with several units",
        ]);

        PropertyType::create([
            'name' => 'Terraced',
            'description' => 'a house built as part of a continuous row in a uniform style',
        ]);

        PropertyType::create([
            'name' => 'Bungalow',
            'description' => 'a small house or cottage that is either single-story or has a second story built into a sloping roof (usually with dormer windows)',
        ]);
    }
}
