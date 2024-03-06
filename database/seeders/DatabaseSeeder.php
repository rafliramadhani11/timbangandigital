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
            'name' => 'Surabaya Pusat',
            'slug' => Str::slug('Surabaya Pusat')
        ]);
        Region::factory()->create([
            'name' => 'Surabaya Timur',
            'slug' => Str::slug('Surabaya Timur')
        ]);
        Region::factory()->create([
            'name' => 'Surabaya Utara',
            'slug' => Str::slug('Surabaya Utara')
        ]);
        Region::factory()->create([
            'name' => 'Surabaya Selatan',
            'slug' => Str::slug('Surabaya Selatan')
        ]);
        Region::factory()->create([
            'name' => 'Surabaya Barat',
            'slug' => Str::slug('Surabaya Barat')
        ]);

        \App\Models\User::factory(20)->create();
        // \App\Models\Anak::factory(10)->create();
        // \App\Models\Timbangan::factory(15)->create();
    }
}
