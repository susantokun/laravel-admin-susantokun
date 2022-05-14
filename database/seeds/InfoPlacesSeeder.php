<?php

use Illuminate\Database\Seeder;

class InfoPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_places')->insert(
            [
                [
                    'name'        => 'Universitas Pakuan, Bogor, Indonesia (2014 - 2019)',
                    'description' => 'Ungul, Mandiri dan Berkarakter',
                    'url'         => 'https://www.unpak.ac.id/id/',
                    'color'       => 'purple',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'name'        => 'SMAN 1 Sukaresmi, Cianjur, Indonesia (2012 - 2014)',
                    'description' => 'Unggul dalam Prestasi, Religius, Kompetitif dan Inovatif, serta Sehat',
                    'url'         => 'https://www.sman1sukaresmi.sch.id/',
                    'color'       => 'blue',
                    'status'      => 'enable',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
