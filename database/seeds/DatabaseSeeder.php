<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(TodoTableSeeder::class);
         $this->call(TaskTableSeeder::class);
           $this->call(NoteTableSeeder::class);
    }
}
