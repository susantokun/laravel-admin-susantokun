<?php

use Illuminate\Database\Seeder;

class InfoCategoryCertificatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_category_certificates')->insert(
            [
                [
                    'title'       => 'Bahasa Inggris',
                    'slug_title'  => 'bahasa-inggris',
                    'description' => '<p>Sertifikat Bahasa Inggris</p>',
                    'color'       => 'purple',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Kemampuan Operasional Komputer',
                    'slug_title'  => 'kemampuan-operasional-komputer',
                    'description' => '<p>Sertifikat Kemampuan Operasional Komputer</p>',
                    'color'       => 'red',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Personal Branding',
                    'slug'        => 'personal-branding',
                    'description' => '<p>Sertifikat Personal Branding</p>',
                    'color'       => 'blue',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Juara / Perlombaan',
                    'slug'        => 'juara-perlombaan',
                    'description' => '<p>Sertifikat Juara / Perlombaan</p>',
                    'color'       => 'green',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Pengurus Kelembagaan Mahasiswa',
                    'slug'        => 'pengurus-kelembagaan-mahasiswa',
                    'description' => '<p>Sertifikat Pengurus Kelembagaan Mahasiswa</p>',
                    'color'       => 'yellow',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Workshop / Pelatihan',
                    'slug'        => 'workshop-pelatihan',
                    'description' => '<p>Sertifikat Workshop/Pelatihan</p>',
                    'color'       => 'yellow',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Kompetensi / Workshop',
                    'slug'        => 'kompetensi-workshop',
                    'description' => '<p>Sertifikat Kompetensi/Workshop</p>',
                    'color'       => 'yellow',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Beasiswa',
                    'slug'        => 'beasiswa',
                    'description' => '<p>Sertifikat Beasiswa</p>',
                    'color'       => 'yellow',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'title'       => 'Hibah Penelitian/Pengabdian Masyarakat',
                    'slug'        => 'hibah-penelitian-pengabdian-masyarakat',
                    'description' => '<p>Sertifikat Hibah Penelitian/Pengabdian Masyarakat</p>',
                    'color'       => 'yellow',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
