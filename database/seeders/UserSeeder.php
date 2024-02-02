<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\MasterUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterUser::create([
            'username' => 'testinguser',
            'nama_user' => 'Testing User',
            'passw' => Hash::make('password123'),
        ]);
    }
}
