<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            'Red', 'Blue', 'Green', 'Yellow', 'Orange',
            'Purple', 'Pink', 'Brown', 'Black', 'White',
            'Gray', 'Silver', 'Gold', 'Beige', 'Maroon',
            'Navy', 'Olive', 'Teal', 'Cyan', 'Magenta',
            'Lime', 'Indigo', 'Violet', 'Coral', 'Turquoise',
            'Mint', 'Lavender', 'Peach', 'Tan', 'Chocolate',
            'Crimson', 'Azure', 'Ivory', 'Rose', 'Burgundy',
            'Mustard', 'Sky Blue', 'Forest Green', 'Sea Green', 'Slate',
            'Plum', 'Sand', 'Copper', 'Bronze', 'Charcoal',
            'Cream', 'Ruby', 'Amber', 'Emerald', 'Sapphire'
        ];

        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'name' => $color,
            ]);
        }

    }
}
