<?php

use Illuminate\Database\Seeder;

class InfoExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_experiences')->insert(
            [
                [
                    'place_id'   => '1',
                    'content'    => 'Sarjana Ilmu Komputer, Ilmu Komputer (IPK 3,70)',
                    'status'     => 'enable',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'place_id'   => '2',
                    'content'    => 'Ilmu Pengetahuan Alam (IPA)',
                    'status'     => 'enable',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
