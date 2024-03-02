<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $post=new Post();

            $post->title = $faker->words(1,true);
            $post->slug = $faker->slug();
            $post->description = $faker->paragraph();
            $post->img = $faker->imageUrl($width = 200, $height = 200, 'man');
            
            $post->save();
    };
}
}