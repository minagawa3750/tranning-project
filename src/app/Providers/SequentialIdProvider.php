<?php

namespace App\Providers;
use Faker\Generator as Faker;
use Illuminate\Support\ServiceProvider;

class SequentialIdProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Faker $faker)
    {
        $faker->addProvider(new class($faker) {
            public function __construct(Faker $faker)
            {
                $this->faker = $faker;
                $this->currentId = 0;
            }

            public function sequentialId()
            {
                return ++$this->currentId;
            }
        });
    }
}
