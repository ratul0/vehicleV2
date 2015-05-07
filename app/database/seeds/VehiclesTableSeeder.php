<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VehiclesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$make = ['Alfa Romeo','Alpine','American Motors','Aston Martin',
//		'BMW','Bugatti','Cadillac','Chevrolet',
//		'Continental','Eagle','Ferrari','Ford',
//		'Imperial','Jaguar','Lamborghini','McLaren',
		'Mazda','Mercedes-Benz','Porsche','Toyota',
		'Tesla Motors','Volkswagen','Volvo','ZAZ',
		];
		$model = ['V1','V2','V3'];
		$data_status = ['ENABLED','DISABLED','ARCHIVED'];

		foreach(range(1, 100) as $index)
		{
			Vehicle::create([
				'make' => $faker->randomElement($make),
				'model' => $faker->randomElement($model),
				'year'  => $faker->year,
				'seller_id' => $faker->numberBetween(1,50),
				'public_at' => $faker->dateTime($max = 'now'),
				'state_status' => $faker->randomElement($data_status)
			]);
		}
	}

}