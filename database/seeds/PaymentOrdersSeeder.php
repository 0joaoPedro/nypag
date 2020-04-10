<?php

use Illuminate\Database\Seeder;

class PaymentOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_orders')->insert([
            'user_id' => 1,
            'valor' => 250.00,
            'descricao' => 'Pagamento Boleto',
        ]);
    }
}
