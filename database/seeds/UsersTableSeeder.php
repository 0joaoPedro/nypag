<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'cnpj_cpf' => '00100200300',
            'name' => 'Fulano de Tal',
            'email' => 'emanuel.silva@nytec.com.br',
            'password' => '$2a$10$0O44VvLLM/ekSMx5nyH2yOm.zxu.koBbTziOuGUcR13sUXFHZPnHC', //11223344
            'phone_number' => '+5592993498646',
            'verified' => 1
        ]);
    }
}
