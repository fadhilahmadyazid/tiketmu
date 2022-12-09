<?php

namespace Database\Seeders;

use App\Models\MasterData\ConfigPayment;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // create data here
         $config_payment = [
            [
            'price' => Str::random(10),
            'pajak' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
    ];
        //this array $spesialis will be insert to table 'configpayment'
         ConfigPayment::insert($config_payment);
    }
}
