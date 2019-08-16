<?php

use Illuminate\Database\Seeder;
use App\Stage;
class AddDummyStage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         

        $data = [

        	['title'=>'Stage Group Kharbouch', 'start_date'=>'2018-12-10', 'end_date'=>'2018-12-25'],
        	['title'=>'Stage CETIC', 'start_date'=>'2019-01-03', 'end_date'=>'2019-01-20'],


        ];

        foreach ($data as $key => $value) {

        	Stage::create($value);

        }

    
    }
}
