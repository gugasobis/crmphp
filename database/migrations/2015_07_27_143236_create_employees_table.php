<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->default(0);
            $table->double('salary');
            $table->double('charges');
            $table->string('cpf', 20);
            $table->string('rg', 20);
            $table->string('address', 150);
            $table->integer('number_address');
            $table->string('neighborhood', 100);
            $table->string('city', 100);
            $table->char('uf', 2);
            $table->string('cep', 20);
            $table->string('email', 100);
            $table->double('benefits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
