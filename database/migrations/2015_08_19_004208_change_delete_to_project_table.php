<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDeleteToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project', function (Blueprint $table) {
            $table->dropForeign('project_owner_id_foreign');
            $table->foreign('owner_id')
                ->references('id')
                ->on('user');

            $table->dropForeign('project_client_id_foreign');
            $table->foreign('client_id')
                ->references('id')
                ->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project', function (Blueprint $table) {
            $table->dropForeign('project_owner_id_foreign');
            $table->foreign('owner_id')
                ->references('id')
                ->on('user')
            ->onDelete('cascade');

            $table->dropForeign('project_client_id_foreign');
            $table->foreign('client_id')
                ->references('id')
                ->on('client')
            ->onDelete('cascade');
        });
    }
}
