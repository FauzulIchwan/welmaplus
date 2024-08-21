<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nasabah')->insert([
            [
                'username' => 'andhikapratama',
                'password' => Hash::make('bcabca'),
                'pin' => '123456',
                'saldo' => 10000000,
            ],
        ]);
    }
}

