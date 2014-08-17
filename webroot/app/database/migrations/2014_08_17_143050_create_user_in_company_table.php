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
        Schema::create('user_in_company', function(Blueprint $t) {
            $t->increments('id');

            $t->integer('user_id');

            $t->integer('company_id');

            $t->integer('status')->default(0);

            $t->tinyInteger('show_on_user_profile')->default(1);
            $t->dateTime('start_date')->nullable();
            $t->dateTime('end_date')->nullable();

            $t->timestamps();
        });

        Schema::table('user_in_company', function(Blueprint $t) {
            //$t->foreign('user_id')->references('id')->on('users');
            //$t->foreign('company_id')->references('id')->on('companies');
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
