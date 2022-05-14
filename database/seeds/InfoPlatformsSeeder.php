<?php

use Illuminate\Database\Seeder;

class InfoPlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_platforms')->insert(
            [
                [
                    'name'        => 'Website',
                    'slug_name'   => 'website',
                    'description' => 'Description website.',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'name'        => 'Mobile',
                    'slug_name'   => 'mobile',
                    'description' => 'Description mobile.',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'name'        => 'Desktop',
                    'slug_name'   => 'desktop',
                    'description' => 'Description desktop.',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
