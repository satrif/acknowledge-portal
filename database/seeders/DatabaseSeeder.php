<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //
        $departments = array(
            array('IT',5),
            array('FIN',5),
            array('CEO',1),
            array('FCM',6),
            array('HR',4),
            array('Sales',6),
            array('MKT',2),
            array('JUR',3)
        );
        foreach ($departments as $department) {
            $flagManager = true;
            $employeeAmount = rand(1,$department[1]);
            for($i = 0; $i < $employeeAmount; $i++){
                User::factory()->create([
                    'is_manager' => $flagManager,
                    'department' => $department[0],
                ]);
                if($flagManager){
                    $flagManager = false;
                }
            }
        }



        $this->call([
            SpasiboSeeder::class
        ]);
    }
}
