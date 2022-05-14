<?php

use Illuminate\Database\Seeder;

class InfoPortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_portfolios')->insert(
            [
                [
                    'category_portfolio_id' => '1',
                    'title'                 => 'AdminProject',
                    'slug_title'            => 'adminproject',
                    'description'           => 'Sistem admin yang menampilkan informasi berupa grafik.',
                    'url_demo'              => 'https://demo.susantokun.com/adminproject',
                    'url_youtube'           => 'kkXcwAPR2-Y',
                    'number_sp'             => '001/SP/WD/04/2019',
                    'number_sstp'           => '001/SSTP/WD/04/2019',
                    'date_start'            => date('Y-m-d H:i:s'),
                    'date_end'              => date('Y-m-d H:i:s'),
                    'status'                => 'enable',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'updated_at'            => date('Y-m-d H:i:s')
                ],
                [
                    'category_portfolio_id' => '2',
                    'title'                 => 'DEMO.susantokun',
                    'slug_title'            => 'demosusantokun',
                    'description'           => 'Semua hasil koding yang ditampilkan secara online.',
                    'url_demo'              => 'https://demo.susantokun.com/',
                    'url_youtube'           => 'kkXcwAPR2-Y',
                    'number_sp'             => '001/SP/WD/04/2019',
                    'number_sstp'           => '001/SSTP/WD/04/2019',
                    'date_start'            => date('Y-m-d H:i:s'),
                    'date_end'              => date('Y-m-d H:i:s'),
                    'status'                => 'enable',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'updated_at'            => date('Y-m-d H:i:s')
                ],
                [
                    'category_portfolio_id' => '3',
                    'title'                 => 'INFO.susantokun',
                    'slug_title'            => 'infosusantokun',
                    'description'           => 'Informasi tentang Susantokun yang bisa disebut cv dan portofolio.',
                    'url_demo'              => 'https://info.susantokun.com/',
                    'url_youtube'           => 'kkXcwAPR2-Y',
                    'number_sp'             => '001/SP/WD/04/2019',
                    'number_sstp'           => '001/SSTP/WD/04/2019',
                    'date_start'            => date('Y-m-d H:i:s'),
                    'date_end'              => date('Y-m-d H:i:s'),
                    'status'                => 'enable',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'updated_at'            => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
