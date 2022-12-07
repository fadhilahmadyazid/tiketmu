<?php

namespace Database\Seeders;

use App\Models\MasterData\JenisTiket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create data here
        $jenistiket = [
            [
                'name' => 'Jenis Tiket 1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Jenis Tiket 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Jenis Tiket 3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // this array $jenistiket will be insert to table 'JenisTiket'
        JenisTiket::insert($jenistiket);
    }
}
