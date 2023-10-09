<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Administrator', 'created_at' => new \DateTime, 'updated_at' => null,],
            ['name' => 'Pustakawan', 'created_at' => new \DateTime, 'updated_at' => null,],
        ];
        DB::table('userroles')->insert($data);
    }
}
