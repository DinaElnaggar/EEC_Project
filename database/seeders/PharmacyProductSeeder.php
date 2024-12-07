<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Pharmacy;

class PharmacyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all product and pharmacy IDs
        $productIds = Product::pluck('id')->toArray();
        $pharmacyIds = Pharmacy::pluck('id')->toArray();

        // Seed data for pharmacy_product table
        $data = [];
        foreach ($pharmacyIds as $pharmacyId) {
            foreach (array_slice($productIds, 0, rand(5, 5)) as $productId) {
                $data[] = [
                    'pharmacy_id' => $pharmacyId,
                    'product_id' => $productId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into the pivot table
        DB::table('pharmacy_products')->insert($data);
    }
}
