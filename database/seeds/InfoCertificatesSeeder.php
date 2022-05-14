<?php

use Illuminate\Database\Seeder;

class InfoCertificatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_certificates')->insert(
            [
                [
                    'category_certificate_id' => '5',
                    'title'                   => 'Making FMIPA Students Critically Thinking Resilient Characteristic and Responsible in The Soul of The Organization',
                    'slug_title'              => 'workshop-pelatihan-fakultas-2015-making-fmipa-students-critically-thinking-resilient-characteristic-and-responsible-in-the-soul-of-the-organization',
                    'description'             => 'Peserta dalam Program Pelatihan Organisasi kemahasiswaan (P2OK) FMIPA UNPAK Bogor',
                    'image'                   => 'images/certificates/susantokun.png',
                    'activity_level'          => 'Fakultas',
                    'slug_activity_level'     => 'fakultas',
                    'date_of_activity'        => '2015-09-30',
                    'status'                  => 'enable',
                    'created_at'              => date('Y-m-d H:i:s'),
                    'updated_at'              => date('Y-m-d H:i:s')
                ],
                [
                    'category_certificate_id' => '2',
                    'title'                   => 'Atlet Regional Sports Week XIII 2018',
                    'slug_title'              => 'juara-perlombaan-kab-kota-2018-atlet-regional-sports-week-xiii-2018',
                    'description'             => 'Keikutsertaan pada PEKAN OLAHRAGA DAERAH (PORDA) XIII - 2018 di Kabupaten Bogor Jawa Barat pada Cabang Olahraga Menembak',
                    'image'                   => 'images/certificates/susantokun.png',
                    'activity_level'          => 'KAB/KOTA',
                    'slug_activity_level'     => 'kab_kota',
                    'date_of_activity'        => '2018-10-08',
                    'status'                  => 'enable',
                    'created_at'              => date('Y-m-d H:i:s'),
                    'updated_at'              => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
