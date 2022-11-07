<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_providers')->insert([
            [ 'type' => 'BANK', 'name' => 'BCA' ],
            [ 'type' => 'BANK', 'name' => 'BNI' ],
            [ 'type' => 'BANK', 'name' => 'BRI' ],
            [ 'type' => 'BANK', 'name' => 'BTN' ],
            [ 'type' => 'BANK', 'name' => 'Mandiri' ],
            [ 'type' => 'BANK', 'name' => 'Other' ],
            [ 'type' => 'EWALLET', 'name' => 'DANA' ],
            [ 'type' => 'EWALLET', 'name' => 'GoPay' ],
            [ 'type' => 'EWALLET', 'name' => 'LinkAja' ],
            [ 'type' => 'EWALLET', 'name' => 'OVO' ],
            [ 'type' => 'EWALLET', 'name' => 'ShopeePay' ],
            [ 'type' => 'EWALLET', 'name' => 'Other' ],
        ]);
    }
}
