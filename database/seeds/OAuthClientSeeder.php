<?php

use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE \"oauth_clients\" CASCADE");

        DB::table('oauth_clients')->insert(
            [
                'id' => md5(env('OAUTH_SECRET_CODE', 'random.app').time()),
                'secret' => env('OAUTH_SECRET_CODE', 'random.app'),
                'name' => env('OAUTH_SECRET_NAME', 'random.app'),
                'created_at' => 'NOW()',
                'updated_at' => 'NOW()',
            ]
        );
    }
}
