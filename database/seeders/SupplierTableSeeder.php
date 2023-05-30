<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'Maersk',
            'email' => 'maersk@yahoo.com',
            'phone' => '0900000000',
            'address' => '56-900 UK'
        ]);

        Supplier::create([
            'name' => 'CGN Global',
            'email' => 'cgnglobal@gmail.com',
            'phone' => '078000000',
            'address' => '23-80900 China'
        ]);
    }
}
