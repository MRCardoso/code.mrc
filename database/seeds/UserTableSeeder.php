<?php

use Illuminate\Database\Seeder;
use CodeMRC\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE \"user\" CASCADE");

        factory(User::class)->create([
            'name' => env('ADMIN_NAME', 'random_name'),
            'email' => env('ADMIN_MAIL', 'random_mail@mail.com'),
            'password' => bcrypt(env('ADMIN_PASS', 123456)),
            'remember_token' => str_random(10),
        ]);

        factory(User::class,20)->create();
    }
}
