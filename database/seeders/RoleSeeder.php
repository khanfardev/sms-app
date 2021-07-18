<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insertOrIgnore([
            ['name' => 'admin','guard_name'=> 'web'],
            ['name' => 'student','guard_name'=> 'web'],
            ['name' => 'teacher','guard_name'=> 'web'],
        ]);
    }
}
