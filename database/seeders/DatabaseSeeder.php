<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=> 'Ximena Moreno',
            'email'=>'ximena@domain.com',
            'password'=>Hash::make('12345678'),
        ]);

        User::create([
            'name'=> 'Secretaria 1',
            'email'=>'secretaria@domain.com',
            'password'=>Hash::make('12345678'),
        ]);

        User::create([
            'name'=> 'Doctor 1',
            'email'=>'doctor@domain.com',
            'password'=>Hash::make('12345678'),
        ]);

        User::create([
            'name'=> 'Paciente1',
            'email'=>'paciente1@domain.com',
            'password'=>Hash::make('12345678'),
        ]);


        
    }
}
