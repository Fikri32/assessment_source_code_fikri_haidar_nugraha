<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Transaction;
use App\Models\Merchant;
use App\Models\Outlet;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = now()->startOfYear()->setYear(2023);
        $endDate = now()->endOfYear()->setYear(2023);
        $faker = Faker::create('id_ID');

        $merchants = Merchant::all();
        $outlets = Outlet::all();

        foreach (range(1, 30) as $index) {
            $transactionTime = $faker->dateTimeBetween($startDate, $endDate);
            $payAmount = $faker->randomNumber(6);
            if ($payAmount < 100000) {
                $payAmount = 100000;
            }
            $tax = ($payAmount * 11) / 100;
            $totalAmount = $payAmount + $tax;
            $changeAmount = $totalAmount - $payAmount;

            $randomMerchant = $merchants->random();

            Transaction::create([
                'id_staff' => $faker->randomElement(range(1, 10)),
                'id_customers' => $faker->randomElement(range(1, 10)),
                'id_outlets' => Outlet::where('id_merchants', $randomMerchant->id)->inRandomOrder()->first()->id,
                'id_merchants' => $randomMerchant->id,
                'transaction_time' => $transactionTime,
                'pay_amount' => $payAmount,
                'payment_type' => $faker->randomElement(['Credit Card', 'Debit Card']),
                'tax' => $tax,
                'change_amount' => $changeAmount,
                'total_amount' => $totalAmount,
                'payment_status' => $faker->randomElement(['Paid', 'Not Paid']),
            ]);
        }
    }
}
