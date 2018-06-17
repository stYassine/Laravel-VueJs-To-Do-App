<?php

use Illuminate\Database\Seeder;

use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $task_1 =Task::create([
            'title' => 'Task Title 1',
            'priority' => 'low'
        ]);
        $task_1 =Task::create([
            'title' => 'Task Title 2',
            'priority' => 'low'
        ]);
        $task_3 =Task::create([
            'title' => 'Task Title 3',
            'priority' => 'medium'
        ]);
        $task_4 =Task::create([
            'title' => 'Task Title 4',
            'priority' => 'high'
        ]);
        $task_5 =Task::create([
            'title' => 'Task Title 5',
            'priority' => 'high'
        ]);
        
    }
    
}
