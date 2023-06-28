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
            'title' => 'Hyundai i30',
            'tags' => 'Car, Disel, Hyundai',
            'description' => 'Lieliska mašīna ikdiena. 2008 gada hyundai
            i30. 1.6 litru dīzelis ar 85kw. Nāk komplektā ar sakabes āķi.',
            'price' => 2700,
            'quantity' => 1,
        ]);

        \App\Models\Product::create([
            'user_id' => $user->id,
            'title' => 'Dzīvoklis Rīgā',
            'tags' => 'Māja, Dzīvoklis',
            'description' => 'Lielisks dzīvoklis Rīgas centrā.
            75 kvadrātmetri, 2 istabas virtuve un tualete.',
            'price' => 50000,
            'quantity' => 1,
        ]);
    }
}
