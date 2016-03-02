<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->string('name', 80)->nullable();
            $table->string('description')->nullable();
            $table->string('progress')->nullable();
            $table->integer('status')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();

            $table->foreign('owner_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->foreign('client_id')
                ->references('id')
                ->on('client')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project');
    }
}
