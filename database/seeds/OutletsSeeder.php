<?php

use Illuminate\Database\Seeder;
use App\Models\Merchant;
use App\Models\Outlet;

class OutletsSeeder extends Seeder
{
    public function run()
    {
        $merchants = Merchant::all();

        foreach ($merchants as $merchant) {
            Outlet::create([
                'name' => 'Outlet ' . $merchant->name,
                'id_merchants' => $merchant->id,
            ]);
        }
    }
}
