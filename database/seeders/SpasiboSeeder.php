<?php

namespace Database\Seeders;

use App\Models\SpasiboItem;
use App\Models\SpasiboJournal;
use App\Models\SpasiboLike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpasiboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Создаем 10 элементов
        $items = SpasiboItem::factory()
            ->count(10)
            ->create();

        // Создаем журнальные записи для каждого элемента
        $items->each(function ($item) {
            SpasiboJournal::factory()
                ->count(3)
                ->create(['v_id' => $item->id]);
        });

        // Создаем лайки
        SpasiboLike::factory()
            ->count(20)
            ->create();
    }
}
