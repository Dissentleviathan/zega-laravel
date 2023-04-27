<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultas')->insert([[
            'nama_fakultas'=> 'Fakultas Ilmu Komputer dan Rekayasa',
            'nama_dekan' => 'Dr. Wijang Widhiarso, M.Kom.',
            'nama_wakil_dekan' => 'Yoannita M.Kom.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'nama_fakultas'=> 'Fakultas Ekonomi dan Bisnis',
            'nama_dekan' => 'Dr. Yulizar Kasih, S.E., M.Si.',
            'nama_wakil_dekan' => 'Dr. Anton Arisman, S.E.,M.Si.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
        ]);
    }
}
