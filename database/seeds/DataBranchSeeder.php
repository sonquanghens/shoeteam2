<?php

use Illuminate\Database\Seeder;

class DataBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('branchs')->insert([
       ['name' => 'Nike','description' => '','image' => '' ],
       ['name' => 'Adidas','description' => '','image' => '' ],
       ['name' => 'Numbl','description' => '','image' => '' ]
      ]);
       }
}
