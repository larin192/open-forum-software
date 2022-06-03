<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    protected $permissions = [
      [
          "name" => "ADMIN | Access",
          "internal_name" => "admin.acp.access",
          "description" => "Dostęp do panelu administratora"
      ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert($this->permissions);
    }
}
