<?php

use Illuminate\Database\Seeder;

class InfoMediaSocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_media_socials')->insert(
            [
                [
                    'title'      => 'Default INFO',
                    'github'     => 'http://github.com/susantokun',
                    'youtube'    => 'http://youtube.com/susantokun',
                    'linked_in'  => 'https://id.linkedin.com/in/susantokun',
                    'facebook'   => 'https://facebook.com/susantokundotcom',
                    'twitter'    => 'https://twitter.com/susantokun',
                    'instagram'  => 'https://instagram.com/susantokun',
                    'line'       => 'susantokun',
                    'steam'      => 'https://steamcommunity.com/id/susantokun',
                    'status'     => 'enable',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
