<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->call('UserTableSeeder');
        $this->call('CompanyTableSeeder');
	}

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'davidjmarland2+user@gmail.com',
            'password' => Hash::make('qwerty')
            )
        );
        $this->command->info('User table seeded!');
    }

}

class CompanyTableSeeder extends Seeder {

    public function run()
    {

        Company::create(array(
            'name' => 'My fake company',
            )
        );
        $this->command->info('Company table seeded!');
    }

}
