<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\t_const;

class ConstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        t_const::create([
            'rkey' => 'SO1',
            'desc' => 'Config SO by Approval',
            'status' => 1,
            'addtime' => '2023-12-30 09:31:39',
            'updtime' => '2023-12-30 09:32:18'
        ]);
    }
}
