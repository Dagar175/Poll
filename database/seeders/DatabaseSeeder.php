<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        \App\Models\Poll::factory()->create([
            'title' => 'Who is a Good Actor?',
            'description' => 'Acting-Wise',
            'user_id' => '1',
        ]);

        \App\Models\Option::factory()->create([
            'poll_id' => '1',
            'content' =>  'Amitabh Bacchan',
        ]);

        \App\Models\Option::factory()->create([
            'poll_id' => '1',
            'content' =>  'Leonardo Dicaprio',
        ]);


        \App\Models\Option::factory()->create([
            'poll_id' => '1',
            'content' =>  'Shahrukh Khan',
        ]);
    }
}
