<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    protected $incomes = [
        'Gaji',
        'Freelance',
        'Bisnis',
        'Investasi',
        'Uang Saku',
    ];

    protected $expenses = [
        'Makanan/Minuman',
        'Tempat Tinggal',
        'Listrik & Air',
        'Internet & Pulsa',
        'Bensin',
        'Transport Umum',
        'Servis Kendaraan',
        'Belanja Harian',
        'Pakaian',
        'Elektronik'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->incomes as $income) {
            Category::create([
                'name' => $income,
                'slug' => Str::slug($income),
                'type' => 'income'
            ]);
        }

        foreach ($this->expenses as $expense) {
            Category::create([
                'name' => $expense,
                'slug' => Str::slug($expense),
                'type' => 'expense'
            ]);
        }
    }
}
