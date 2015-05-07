<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccountsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$data_status = ['ENABLED','DISABLED','ARCHIVED'];

		foreach(range(1, 100) as $index)
		{
			Account::create([
				'state_status' => $faker->randomElement($data_status),
				'zip' => $faker->countryCode
			]);
		}
	}

}