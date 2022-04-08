<?php

namespace Database\Seeders;

use App\Models\Jenis;
use App\Models\Merk;
use Illuminate\Database\Seeder;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toyota = Merk::create([
            'merk' => 'Toyota'
        ]);

        $toyota->jenis()->createMany([
            [
                'jenis' => 'Calya 1.2 G M/T'
            ],
            [
                'jenis' => 'Avanza 1.3 G M/T'
            ],
            [
                'jenis' => 'Kijang Innova 2.4 D A/T'
            ],
            [
                'jenis' => 'Yaris 1.5 A/T'
            ],
            [
                'jenis' => 'Fortuner VRZ 2.4 A/T'
            ],
        ]);

        $honda = Merk::create([
            'merk' => 'Honda'
        ]);

        $honda->jenis()->createMany([
            [
                'jenis' => 'Brio 1.2 RS CVT CKD'
            ],
            [
                'jenis' => 'HR-V 1.5 S A/T'
            ],
            [
                'jenis' => 'Civic 1.5 CVT CKD'
            ],
            [
                'jenis' => 'BR-V 1.5 RS M/T'
            ]
        ]);

        $daihatsu = Merk::create([
            'merk' => 'Daihatsu'
        ]);

        $daihatsu->jenis()->createMany([
            [
                'jenis' => 'Sigra 1.0 X M/T'
            ],
            [
                'jenis' => 'All New Xenia 1.2 X M/T'
            ],
            [
                'jenis' => 'Rocky 1.0 A/T'
            ]
        ]);
    }
}
