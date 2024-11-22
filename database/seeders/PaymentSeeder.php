<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'card_holder_name' => 'John Doe',
                'amount' => 1500, // Amount in cents (R15.00)
                'currency' => 'zar',
                'stripe_charge_id' => 'ch_1IjZIK2eZvKYlo2CeVRZff3B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_holder_name' => 'Jane Smith',
                'amount' => 3000, // Amount in cents (R30.00)
                'currency' => 'zar',
                'stripe_charge_id' => 'ch_1IjZIL2eZvKYlo2Cz5k7p4r9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more dummy records as needed
        ]);
    }
}

