<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => '5 Destinasi Wisata Menarik',
                'author' => 'Admin',
                'image' => 'news/1',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec ligula eget nisl elementum mattis et et dolor. Vivamus auctor sodales malesuada. Nunc dignissim aliquam interdum. Donec luctus eleifend enim nec iaculis. Curabitur a purus dignissim, pharetra ligula a, imperdiet tellus. Fusce hendrerit varius erat, sed vulputate arcu commodo ac. Donec tincidunt efficitur velit vitae fermentum. Aliquam congue cursus aliquam. Cras quis dapibus lectus. Morbi eu nunc lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis felis, non auctor neque sollicitudin id.',
            ],
            [
                'title' => '5 Destinasi Wisata Menarik',
                'author' => 'Admin',
                'image' => 'news/2',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec ligula eget nisl elementum mattis et et dolor. Vivamus auctor sodales malesuada. Nunc dignissim aliquam interdum. Donec luctus eleifend enim nec iaculis. Curabitur a purus dignissim, pharetra ligula a, imperdiet tellus. Fusce hendrerit varius erat, sed vulputate arcu commodo ac. Donec tincidunt efficitur velit vitae fermentum. Aliquam congue cursus aliquam. Cras quis dapibus lectus. Morbi eu nunc lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis felis, non auctor neque sollicitudin id.',
            ],
            [
                'title' => '5 Destinasi Wisata Menarik',
                'author' => 'Admin',
                'image' => 'news/3',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec ligula eget nisl elementum mattis et et dolor. Vivamus auctor sodales malesuada. Nunc dignissim aliquam interdum. Donec luctus eleifend enim nec iaculis. Curabitur a purus dignissim, pharetra ligula a, imperdiet tellus. Fusce hendrerit varius erat, sed vulputate arcu commodo ac. Donec tincidunt efficitur velit vitae fermentum. Aliquam congue cursus aliquam. Cras quis dapibus lectus. Morbi eu nunc lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis felis, non auctor neque sollicitudin id.',
            ]
        ];

        foreach ($data as $key => $value) {
            news::create($value);
        }
    }
}
