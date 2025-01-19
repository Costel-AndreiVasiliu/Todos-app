<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    public function run()
    {
        Todo::create([
            'title' => 'Test Todo 1',
            'description' => 'This is a test todo'
        ]);

        Todo::create([
            'title' => 'Test Todo 2',
            'description' => 'This is another test todo'
        ]);
    }
}