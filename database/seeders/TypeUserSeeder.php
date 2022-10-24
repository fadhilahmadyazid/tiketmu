<?php

namespace Database\Seeders;
use App\Models\MasterData\TypeUser;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TypeUser')->insert([
            'nama' => Str::random(10),
            'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
        ]);

        $type_user =[
            [
                name => 'Admin',
            ],
            [
                name => 'User',
            ],
        ];

        TypeUser::insert($type_user);
        }
}
