<?php

namespace Database\Seeders;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 50; $i++) {
            Movie::query()->create([
                'gene_id'   => rand(1, 5),
                'title'     => fake()->text(50),
                'poster'    => '',
                'intro'     => fake()->text(150),
                'release_date' => Carbon::now()->format('Y-m-d'),
            ]);
        }
    }
}
