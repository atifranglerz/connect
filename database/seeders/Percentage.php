<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentPercentage;

class Percentage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPercentage::create([
            'id' => '1',
            'type' => 'withdraw',
            'percentage' => '20',
        ],
        [
            'id' => '2',
            'type' => 'order',
            'percentage' => '30',
        ],
        [
            'id' => '3',
            'type' => 'vat',
            'percentage' => '5',
        ]);
    }
}
