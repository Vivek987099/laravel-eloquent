<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses') -> insert([
            ['name'=>'BBA','description'=>'no','duration'=>3],
            ['name'=>'BCA','description'=>'no','duration'=>3],
            ['name'=>'MCA','description'=>'no','duration'=> 2 ],
            ['name'=>'MBA','description'=>'no','duration'=>2],
        ]);
    }
}
