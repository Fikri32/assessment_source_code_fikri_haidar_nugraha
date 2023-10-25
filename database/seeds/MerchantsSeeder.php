<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Merchant;

class MerchantsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $merchantNames = [
            'Toko Pakaian Maju Jaya',
            'Restoran Lezat Rasa',
            'Toko Elektronik Tekno',
            'Minimarket Cepat',
            'Kedai Kopi Hangat',
            'Salon Cantik Indah',
            'Apotek Sehat Jaya',
            'Toko Buku Pintar',
            'Bengkel Mobil Terbaik',
            'Butik Fashion Elegan',
        ];

        foreach ($merchantNames as $merchantName) {
            Merchant::create([
                'name' => $merchantName,
            ]);
        }
    }
}
