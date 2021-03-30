<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ConferenceSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [];

        $cName = 'No section';
        $sections[] = [
            'title'         => $cName,
            'slug'          => Str::slug($cName),
            'parent_id'     => 0,
        ];

        for($i = 1; $i <= 10; $i++)
        {
            $cName = 'Section #'.$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $sections[] = [
                'title'         => $cName,
                'slug'          => Str::slug($cName),
                'parent_id'     => $parentId,
            ];
        }

        \DB::table('conference_sections')->insert($sections);

    }
}
