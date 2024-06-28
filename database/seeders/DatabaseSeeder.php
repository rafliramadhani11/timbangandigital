<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Region::factory()->create([
            'name' => 'Surabaya Tengah',
            'slug' => Str::slug('Surabaya Tengah')
        ]);
        Region::factory()->create([
            'name' => 'Surabaya Timur',
            'slug' => Str::slug('Surabaya Timur')
        ]);
        Region::factory()->create([
            'name' => 'Surabaya Utara',
            'slug' => Str::slug('Surabaya Utara')
        ]);


        \App\Models\User::factory(1)->create();
        // \App\Models\Anak::factory(10)->create();
        // \App\Models\Timbangan::factory(15)->create();
    }
}
