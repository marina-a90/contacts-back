<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContactsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);   
        // ili     
        // php artisan db:seed --class=UsersTableSeeder
    }
}
