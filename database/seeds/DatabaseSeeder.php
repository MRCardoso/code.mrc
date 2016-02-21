<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


/**
 * Class DatabaseSeeder
 * mesmo usando o truncate cascade retorna esta mensagem:

    [Illuminate\Database\QueryException]
    SQLSTATE[0A000]: Feature not supported: 7 ERROR:  cannot truncate a table r
    eferenced in a foreign key constraint
    DETAIL:  Table "project" references "user".
    HINT:  Truncate table "project" at the same time, or use TRUNCATE ... CASCA
    DE. (SQL: truncate "user" restart identity)

    [PDOException]
    SQLSTATE[0A000]: Feature not supported: 7 ERROR:  cannot truncate a table r
    eferenced in a foreign key constraint
    DETAIL:  Table "project" references "user".
    HINT:  Truncate table "project" at the same time, or use TRUNCATE ... CASCA
    DE.
 * nesta url eu vi o segunte: http://postgresqlbr.blogspot.com.br/2007/05/o-comando-truncate.html
 * Não é permitido TRUNCATE se a tabela truncada é referenciada por uma tabela filha através de foreign key:
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);

        $this->call(ClientTableSeeder::class);

        $this->call(ProjectTableSeeder::class);

        $this->call(ProjectTaskTableSeeder::class);

        $this->call(ProjectMembersTableSeeder::class);

        $this->call(OAuthClientSeeder::class);

        Model::reguard();
    }
}
