<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \Flommerce\Category([
            'title' => 'Computers',
            'description' => 'Decent computers at fair prices.',
            'slug' => 'computers'
        ]);
        $category->save();

        $category = new \Flommerce\Category([
            'title' => 'Services',
            'description' => 'We do things so that you do not have too.',
            'slug' => 'services'
        ]);
        $category->save();

        $category = new \Flommerce\Category([
            'title' => 'Freebies',
            'description' => 'Everybody loves free stuff right?',
            'slug' => 'freebies'
        ]);
        $category->save();
    }
}
