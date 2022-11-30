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
        DB::table('ConfigPayment')->insert([
            'price' => Str::random(10),
            'pajak' => Str::random(10),
            'total' => Str::random(10),
        ]);
        //create data here
        // $config_payment = [
        // [
        // fee   => '150000',
        // pajak => '10', //Pajak dalam bentuk persen
        // total => '',
        // ],

    // ];

        //this array $spesialis will be insert to table 'configpayment'
        // ConfigPayment::insert($config_payment);
    }
}
