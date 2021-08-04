<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;


class Designations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Designation::insert(

                [

                    'designation'=>'Full Stack Developer'
                ]

        );
        
    }
}
