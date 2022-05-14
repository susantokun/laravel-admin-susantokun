<?php

use Illuminate\Database\Seeder;

class InfoConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_configurations')->insert(
            [
                [
                    'media_social_id'    => '1',
                    'website_name'       => 'INFO.susantokun',
                    'author'             => 'SUSANTO',
                    'url'                => 'https://info.susantokun.com/',
                    'logo'               => 'logo.png',
                    'favicon'            => 'favicon.png',
                    'avatar'             => 'avatar.png',
                    'email'              => 'admin@susantokun.com',
                    'telp'               => '081906515912',
                    'place_of_birth'     => 'Cianjur',
                    'date_of_birth'      => '1996-03-27',
                    'profession'         => 'Web Developer',
                    'job_specialization' => 'CodeIgniter, Laravel, ReactJS',
                    'address'            => 'KOMPLEK BTN Munjul No.12A 02/06, Sukaresmi, Cianjur, Jawa Barat, Indonesia (43253)',
                    'latitude'           => '-6.714050',
                    'longitude'          => '107.069097',
                    'api_key'            => '-',
                    'website_1'          => 'https://susantokun.com/',
                    'website_2'          => 'https://info.susantokun.com/',
                    'website_3'          => 'https://demo.susantokun.com/',
                    'keywords'           => 'info susantokun, info.susantokun, info-susantokun',
                    'metatext'           => 'Informasi tentang Susantokun',
                    'about'              => 'Informasi tentang Susantokun',
                    'introduction'       => '<p>Perkenalkan nama saya Susanto, saya adalah seorang programmer yang fokus di bidang web programming. Spesialisasi saya terletak pada proses perencanaan, pemrograman, dan testing. Yaitu sebelum melakukan proses coding saya harus mengetahui tujuan dan menganalisa terlebih dahulu, setelah program selesai saya melakukan uji coba untuk menjaga kualitas yang akan mendukung perkembangan perusahaan tempat saya bekerja.</p>
                <p>Saya terbiasa mencoba hal baru terutama untuk memudahkan saat mengembangkan aplikasi sistem. Berkat kebiasaan tersebut saya dapat mengerti alur dari sistem dan mempunyai style coding sendiri.</p>',
                    'status'     => 'enable',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
