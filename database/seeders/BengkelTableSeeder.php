<?php

namespace Database\Seeders;

use App\Models\Bengkel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BengkelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bengkel::insert([
            [
                'bengkel' => 'Saphhire Body & Paint',
                'lokasi' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bengkel' => 'Emerald (PT Harta Adi Pratama)',
                'lokasi' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bengkel' => 'Mentari Autohaus',
                'lokasi' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bengkel' => 'Auto 2000 Body & Cat',
                'lokasi' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bengkel' => 'Honda Sonic',
                'lokasi' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bengkel' => 'Daihatsu Astra Bizz Centre',
                'lokasi' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bengkel' => 'Perfect Auto Zone',
                'lokasi' => 'Tasikmalaya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bengkel' => 'Buana Auto Body',
                'lokasi' => 'Garut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
