<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectCategorySeeder extends Seeder
{
    protected $categories = [
        ["name" => "Primary", "name_url" => "primary", "parent" => "0"],
        ["name" => "Secondary", "name_url" => "secondary", "parent" => "0"],
        ["name" => "Lorem ipsum", "name_url" => "lorem-ipsum", "parent" => "1"],
        ["name" => "Lorem ipsum 1", "name_url" => "lorem-ipsum-1", "parent" => "1"],
        ["name" => "Lorem ipsum 2", "name_url" => "lorem-ipsum-2", "parent" => "1"],
        ["name" => "Lorem ipsum 3", "name_url" => "lorem-ipsum-3", "parent" => "2"],
        ["name" => "Lorem ipsum 4", "name_url" => "lorem-ipsum-4", "parent" => "2"],
        ["name" => "Lorem ipsum 5", "name_url" => "lorem-ipsum-5", "parent" => "2"],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_categories')->insert($this->categories);
    }
}
