<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
             'name' => 'Jemils',
             'email' => 'test@example.com',
             'password' => 'parole12',
        ]);


        \App\Models\Product::create([
            'user_id' => $user->id,
            'title' => 'Compact',
            'tags' => '2 Modules, Small',
            'description' => 'Maza vasaras maja',
            'price' => 35000,
            'quantity' => 5,
        ]);

        \App\Models\Product::create([
            'user_id' => $user->id,
            'title' => 'Compact pluss',
            'tags' => '3 Modules, Big',
            'description' => 'Liela maja ikdienai',
            'price' => 50000,
            'quantity' => 2,
        ]);
    }
}
