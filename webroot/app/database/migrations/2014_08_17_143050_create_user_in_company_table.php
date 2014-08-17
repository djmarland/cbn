<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		{
            $t->increments('id');
            $t->primary('id');

            $t->integer('user_id');
            $t->foreign('user_id')->references('id')->on('users');

            $t->integer('company_id');
            $t->foreign('company_id')->references('id')->on('companies');

            $t->integer('status')->default(0);

            $t->tinyInteger('show_on_user_profile')->default(1);

            $t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_in_company');
	}

}
