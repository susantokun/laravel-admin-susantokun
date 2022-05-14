<?php

use Illuminate\Database\Seeder;

class InfoFrameworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_frameworks')->insert(
            [
                [
                    'name'        => 'CodeIgniter',
                    'slug_name'   => 'codeigniter',
                    'description' => 'CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.',
                    'url'         => 'https://codeigniter.com/',
                    'image'       => 'https://cdn1.iconfinder.com/data/icons/logos-3/304/codeigniter-icon-512.png',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'name'        => 'Laravel',
                    'slug_name'   => 'laravel',
                    'description' => 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
                    'url'         => 'https://laravel.com/',
                    'image'       => 'https://www.designbust.com/download/168/png/laravel_icon256.png',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'name'        => 'ReactJS',
                    'slug_name'   => 'reactjs',
                    'description' => 'A JavaScript library for building user interfaces.',
                    'url'         => 'https://reactjs.org/',
                    'image'       => 'https://cdn2.iconfinder.com/data/icons/designer-skills/128/react-512.png',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'name'        => 'Kotlin',
                    'slug_name'   => 'kotlin',
                    'description' => 'Programming language for JVM, Android, Browser, Native.',
                    'url'         => 'https://kotlinlang.org/',
                    'image'       => 'kotlin.png',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'name'        => 'Unity',
                    'slug_name'   => 'unity',
                    'description' => 'Start bringing your vision to life today. Unity’s real-time 3D development platform empowers you with all you need to create, operate, and monetize.',
                    'url'         => 'https://unity.com/',
                    'image'       => 'unity.png',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ]

            ]
        );
    }
}
