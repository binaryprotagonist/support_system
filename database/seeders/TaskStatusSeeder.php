<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
               'status'=>'Pending',
            ],
            [
                'status'=>'In Progress',
            ],
            [
                'status'=>'Completed',
            ],
            [
                 'status'=>'Rejected',
            ],
             
        ];
  
        foreach ($status as $key => $value) {
            TaskStatus::create($value);
        }
    }
}
