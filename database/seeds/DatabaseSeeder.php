<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MerchantsSeeder::class);
        $this->call(OutletsSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(TransactionsSeeder::class);
    }
}
